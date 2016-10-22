<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Unit extends \Codeception\Module
{
    /**
     * Check if the given text is present in the response.
     *
     * @param $text
     *   Text to look for.
     *
     * @return bool
     */
    public function seeResponseContains($text)
    {
        $this->assertContains(
            $text,
            $this->getModule('Symfony2')->_getReponseContent(),
            'response contains'
        );
    }
}
