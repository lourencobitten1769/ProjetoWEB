<?php
namespace frontend\tests;

use common\models\CartItems;
use common\models\Productspurchases;

class ProductsPurchasesTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $productspurchases=new Productspurchases();

        $productspurchases->setProductId(null);
        $this->assertFalse($productspurchases->validate(['product_id']));

        $productspurchases->setProductId(10);
        $this->assertFalse($productspurchases->validate(['product_id']));

        $productspurchases->setQuantity(5);
        $this->assertTrue($productspurchases->validate(['quantity']));

        $productspurchases->setPurchaseId(20);
        $this->assertFalse($productspurchases->validate(['purchase_id']));

        $productspurchases->save();

        $this->tester->seeInDatabase('productspurchases',['quantity'=>'2']);
    }
}