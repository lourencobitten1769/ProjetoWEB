<?php
namespace frontend\tests;

use common\models\CartItems;
use common\models\Purchases;

class CartTest extends \Codeception\Test\Unit
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
        $cart=new CartItems();

        $cart->setProductId(null);
        $this->assertFalse($cart->validate(['product_id']));

        $cart->setProductId('20');
        $this->assertFalse($cart->validate(['product_id']));

        $cart->setQuantity(5);
        $this->assertTrue($cart->validate(['quantity']));

        $cart->setCreatedBy(1);
        $this->assertTrue($cart->validate(['created_by']));

        $cart->save();

        $this->tester->seeInDatabase('cart_items',['quantity'=>'5']);
    }
}