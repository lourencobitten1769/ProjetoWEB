<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class SignupCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnRoute('/site/signup');
        $I->fillField('Username','teste');
        $I->fillField('Password','password_teste');
        $I->fillField('Email','teste@gmail.pt');
        $I->fillField('Morada','Lisboa');
        $I->fillField('Nif',919191919);
        $I->click('signup-button');
    }
}
