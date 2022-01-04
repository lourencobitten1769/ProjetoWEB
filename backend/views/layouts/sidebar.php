<?php
    use yii\helpers\Html;
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <h3>Loja Diferenciada</h3>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block"><?php use app\models\AuthAssignment;

                    echo Yii::$app->user->identity->username?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php

            $user=AuthAssignment::findBySql('SELECT * FROM auth_assignment WHERE user_id='.Yii::$app->user->id)->one();

            if($user->item_name=='admin'){
                $menuitems=[
                    ['label' => 'Utilizadores', 'url' => ['user/index']],
                    ['label' => 'Produtos', 'url' => ['product/index']],
                    ['label' => 'Categorias', 'url' => ['category/index']],
                    ['label' => 'Encomendas', 'url' => ['order/index']],
                    ['label' => 'Fornecedores', 'url' => ['provider/index']],
                    ['label' => 'Compras', 'url' => ['purchase/index']],

                ];
            }
            else if ($user->item_name=='productManager'){
                $menuitems=[
                    ['label' => 'Produtos', 'url' => ['product/index']],
                    ['label' => 'Encomendas', 'url' => ['order/index']],
                ];
            }
            ?>

            <?php

            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => $menuitems,
            ]);

            ?>
            <?= Html::a('<i class="fas fa-sign-out-alt">Logout</i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>