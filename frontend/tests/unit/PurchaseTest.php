<?php
namespace frontend\tests;

use common\models\Products;
use common\models\Purchases;

class PurchaseTest extends \Codeception\Test\Unit
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
        $purchase=new Purchases();

        $purchase->setTotalPrice(null);
        $this->assertFalse($purchase->validate(['total_price']));

        $purchase->setTotalPrice(70);
        $this->assertTrue($purchase->validate(['total_price']));

        $purchase->setDate('2022-01-02 15:59:06');
        $this->assertTrue($purchase->validate(['date']));

        $purchase->setUserId(1);
        $this->assertTrue($purchase->validate(['user_id']));

        $purchase->save();

        $this->tester->seeInDatabase('purchases',['total_price'=>'70']);
    }
}