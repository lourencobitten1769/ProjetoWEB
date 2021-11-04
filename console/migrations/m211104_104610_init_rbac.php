<?php

use yii\db\Migration;

/**
 * Class m211104_104610_init_rbac
 */
class m211104_104610_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211104_104610_init_rbac cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth= Yii::$app->authManager;

        //permissões para "gerir utilizadores"
        $manageUsers= $auth->createPermission('manageUsers');
        $manageUsers->description= 'Manage Users';
        $auth->add($manageUsers);

        //permissões para "gerir fornecedores"
        $manageProviders=$auth->createPermission('manageProviders');
        $manageProviders->description='Manage Providers';
        $auth->add($manageProviders);

        //permissões para "gerir encomendas"
        $manageOrders= $auth->createPermission('manageOrders');
        $manageOrders->description="Manage Orders";
        $auth->add($manageOrders);

        //permissões para "gerir produtos"
        $manageProducts=$auth->createPermission('manageProducts');
        $manageProducts->description='Manage Products';
        $auth->add($manageProducts);

        //permissões para "ver e comprar produtos"
        $seeBuyProducts=$auth->createPermission('seeBuyProducts');
        $seeBuyProducts->description='See and buy products';
        $auth->add($seeBuyProducts);

        //permissões para "procurar produtos"
        $searchProducts=$auth->createPermission('searchProducts');
        $searchProducts->description='Search products';
        $auth->add($searchProducts);

        //permissões para "gerir as suas próprias informações"
        $manageOwnInfos=$auth->createPermission('manageOwnInfos');
        $manageOwnInfos->description='Manage Own Infos';
        $auth->add($manageOwnInfos);

        //permissões para "ver o histórico de compras"
        $purchaseHistory=$auth->createPermission('purchaseHistory');
        $purchaseHistory->description='Purchase History';
        $auth->add($purchaseHistory);

        //criar o role de "gestor de produtos"
        $productManager=$auth->createRole('productManager');
        $auth->add($productManager);
        $auth->addChild($productManager,$manageProducts);
        $auth->addChild($productManager,$manageOrders);

        //criar o role de "administrador"
        $admin=$auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin,$manageUsers);
        $auth->addChild($admin,$manageProviders);
        $auth->addChild($admin,$productManager);



        //$auth->assign($admin,1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

}
