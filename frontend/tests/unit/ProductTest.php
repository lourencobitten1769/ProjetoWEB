<?php
namespace frontend\tests;

use common\models\Products;

class ProductTest extends \Codeception\Test\Unit
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
        $product=new Products();

        $product->setProductName(null);
        $this->assertFalse($product->validate(['product_name']));

        $product->setProductName('Carro');
        $this->assertTrue($product->validate(['product_name']));

        $product->setDescription('Carro 600 cavalos');
        $this->assertTrue($product->validate(['description']));

        $product->save();

        $this->tester->seeInDatabase('products',['product_name'=>'Rato']);
    }
}