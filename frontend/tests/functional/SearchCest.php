<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class SearchCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->fillField('search','Rato');
        $I->click('submit');
    }
}
