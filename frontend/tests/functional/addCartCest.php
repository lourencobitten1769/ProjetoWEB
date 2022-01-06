<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class addCartCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {

        $I->amOnPage(\Yii::$app->homeUrl);
        $I->click('Comprar');
        $I->fillField('Quantidade',3);
        $I->click('btnAddCart');
    }
}
