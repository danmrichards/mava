Feature: about page
  In order to see about page contents
  As a user
  I am able to visit about page

  @javascript
  Scenario: Visiting about page
  Given I am on "/about"
  Then I should see "mava is a web app"

  @javascript
  Scenario: Visiting about page for an existing user
  Given I am on "/about/john"
  Then I should see "He is a cool guy"

  @javascript
  Scenario: Visiting about page for non existing user
  Given I am on "/about/jim"
  Then I should see "Not found"
