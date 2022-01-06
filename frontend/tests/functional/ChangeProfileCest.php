<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class ChangeProfileCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->click('Login');
        $I->fillField('Username', 'bitten');
        $I->fillField('Password', 'lourenco65');
        $I->click('login-button');
        $I->click('Perfil');
        $I->fillField('Email:','teste@gmail.com');
        //$I->click('btnAlterar');
        $I->amOnRoute('/user/profile');
    }
}
