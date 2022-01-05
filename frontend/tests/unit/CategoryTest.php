<?php
namespace frontend\tests;

use common\models\Categories;
use common\models\Products;

class CategoryTest extends \Codeception\Test\Unit
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
        $category=new Categories();

        $category->setCategoryId(10);
        $this->assertTrue($category->validate(['category_id']));

        $category->setCategory('Veiculos');
        $this->assertTrue($category->validate(['category']));

        $category->setCategory(10);
        $this->assertFalse($category->validate(['category']));

        $category->save();

        $this->tester->seeInDatabase('categories',['category'=>'Roupa']);
    }
}