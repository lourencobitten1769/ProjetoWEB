<?php
namespace frontend\tests\acceptance;
use frontend\tests\AcceptanceTester;
class ConsultarFaturasCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->wait(2);
        $I->click('Login');
        $I->wait(2);
        $I->fillField('Username', 'bitten');
        $I->wait(2);
        $I->fillField('Password', 'lourenco65');
        $I->wait(2);
        $I->click('login-button');
        $I->wait(2);
        $I->click('Perfil');
        $I->wait(2);
        $I->click('Consultar');
        $I->wait(2);

    }
}
