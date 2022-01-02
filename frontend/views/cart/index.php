<?php
/** @var array $items */
?>

<!--<div class="card">
    <div class="card-header">
        <h3>Your cart items</h3>
    </div>
    <div class="card-body p-0">-->
        <?php if(!empty($items)):?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Product</th>
                <th>Image</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item):?>
                <tr>
                    <td><?php echo $item['product_name']?></td>
                    <td><img style="height: 100px; width: 100px" src='images/<?php echo $item['image']?>'</td>
                    <td><?php echo $item['price']?></td>
                    <td><?php echo $item['quantity']?></td>
                    <td><?php echo $item['total_price']?></td>
                    <td><?php echo \yii\helpers\Html::a('Delete',['/cart/delete', 'id'=> $item['id']],[
                            'class' =>'btn btn-outline-danger btn-sm',
                            'data-method' => 'post'
                        ])?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

        <a href="<?php echo \yii\helpers\Url::to(['/cart/confirm'])?>" class="btn btn-primary">Checkout</a>

        <?php else:?>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="text-muted text-center">There are no items in the cart</p></td>
                </tr>
                </tbody>
            </table>


        <?php endif;?>
<!--</div>
</div>-->

