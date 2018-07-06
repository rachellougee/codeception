<?php


class AcceptTestingCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('email', 'rachelzhang8128@gmail.com');
        $I->fillField('pass', 'mypassword');
        $I->click('Log In');
        $I->see('The password you’ve entered is incorrect');
    }
}
