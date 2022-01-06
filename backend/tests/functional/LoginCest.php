<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;
class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryLogin(FunctionalTester $I)
    {
        $I->amOnRoute('/site/login');
        $I->fillField('Username', 'bitten');
        $I->fillField('Password', 'lourenco65');
        $I->click('Sign In');
    }
}
