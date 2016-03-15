<?php

use Behat\MinkExtension\Context\MinkContext as Context;

/**
 * Features context.
 */
class FeatureContext extends Context {

    /**
     * @Given /^I am authenticated as "([^"]*)" using "([^"]*)"$/
     */
    public function iAmAuthenticatedAs($username, $password) {
        $this->visit('/login');
        $this->fillField('_username', $username);
        $this->fillField('_password', $password);
        $this->pressButton('_submit');
    }

}
