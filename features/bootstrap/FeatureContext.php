<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Mink\Exception\ElementNotFoundException;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When I press more
     */
    public function iPressMore()
    {
        $this->getSession()
            ->getPage()
            ->findButton("more")
            ->press();
    }

    /**
     * @Given I am logged in as admin
     */
    public function iAmLoggedInAsAdmin()
    {
        $this->visit('/admin/login');
        $this->fillField('username', 'admin');
        $this->fillField('password', 'admin');
        $this->pressButton('_submit');
    }

    /**
     * @Given There are :count workspaces
     *
     * @param int $count
     *   Number of workspaces.
     */
    public function thereAreWorkspaces($count)
    {
        // TODO: Count number of workspaces.
    }

    /**
     * @When I click on :identifier
     *
     * @param string $identifier
     *   Name of a link or button element.
     *
     * @throws ElementNotFoundException
     */
    public function iClickOn($identifier)
    {
        // Try to find a link first.
        if ($this->getSession()->getPage()->findLink($identifier)) {
            $this->clickLink($identifier);
        }
        elseif ($this->getSession()->getPage()->findButton($identifier)) {
            // Next check for buttons.
            $this->pressButton($identifier);
        }
        else {
            // No matching element found.
            throw new ElementNotFoundException(
                $this->getSession(), 'link or button', 'id|title|alt|text', $identifier
            );
        }
    }

    /**
     * @Then I should see :count items in the table
     *
     * @param int $count
     *   Number of expected items.
     */
    public function iShouldSeeItemsInTheTable($count)
    {
        // TODO: Count given number of items in the table.
    }

    /**
     * @When I fill the :element with :value
     *
     * @param string $element
     *   Element to populate.
     * @param string|int $value
     *   Value to populate the element with.
     *
     * @throws ElementNotFoundException
     */
    public function iFillTheWith($element, $value)
    {
        // Attempt to find the field.
        $field = $this->getSession()->getPage()->findField($element);

        // Throw an exception if the field could not be found.
        if (null === $field) {
            throw new ElementNotFoundException(
                $this->getSession(), 'form field', 'id|name|label|value', $locator
            );
        }

        // Populate the field value.
        $field->setValue($value);
    }

    /**
     * @Given I log in as Jack
     */
    public function iLogInAsJack()
    {
        $this->visit('/login');
        $this->fillField('username', 'Jack');
        $this->fillField('password', 'jackpass');
        $this->pressButton('_submit');
    }
}
