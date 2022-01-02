<?php
/* @var $this yii\web\View */

$this->title = 'Homepage';

$precoCompra =0;
?>

<div class="confirm-purchase">
    <h1>Confirmação de Compra</h1>
    <hr>
    <div class="purchase-item">
        <table>
            <?php

            foreach ($items as $item){?>
            <tr style="border-bottom: 1px solid black">
                <td><img style="width: 100px"src="images/<?php echo $item['image']?>"></td>
                <td><strong><?php echo $item['product_name']?></strong></td>
                <td><?php echo $item['quantity']?></td>
                <td><?php echo $item['total_price']?></td>
            </tr>

            <?php
            $precoCompra = $precoCompra + $item['total_price'];
            }
            ?>
        </table>

        <h6 style="text-align: center">Preço Total: <?php echo $precoCompra;?> €</h6>

    </div>

    <div class="payment-methods">
        <h2>Pagar com:</h2>
        <a href="<?php echo \yii\helpers\Url::to(['/cart/payment','precoCompra'=>$precoCompra])?>"><img style="width: 250px;" src="images/paypalBtn.png" </a>
        <br>

        <a href="<?php echo \yii\helpers\Url::to(['/cart/confirm'])?>"><img style="width: 200px; margin-left: 10px" src="images/multibanco.png" </a>
    </div>

</div>

