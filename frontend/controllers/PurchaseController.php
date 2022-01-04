<?php

namespace frontend\controllers;
use common\models\Productspurchases;
use common\models\Purchases;
use Dompdf\Dompdf;
use Dompdf\Options;

require_once 'D:\xampp\htdocs\ProjetoWEB\vendor\dompdf\dompdf\src\Autoloader.php';

class PurchaseController extends \yii\web\Controller
{
    public function actionPdf($purchase_id)
    {
        $purchase=Purchases::findOne($purchase_id);
        $productNumber=Productspurchases::findBySql("SELECT COUNT(*) as numero FROM productspurchases WHERE `purchase_id`=:purchaseId" , ['purchaseId'=>$purchase_id])->asArray()->all();
        var_dump($productNumber);

        $dompdf=new Dompdf();

        $html='<h1>Loja Diferenciada</h1><br><h2>Fatura</h2><hr>';

        $html.= '<table>
                     <thead>
                       <tr>
                            <th width="450px" align="left">Cliente:</th>
                            <th align="right">Data da Compra:</th>  
                       </tr>
                     </thead>
                     <tbody><tr><td>' . $purchase['user']['username'] . '</td><td align="right">' . $purchase['date'] . '</td></tr><tr><td>' . $purchase['user']['morada'] . '<td></tbody></table>';

        $html.='<br><br>
                <table border="1px solid black">
                       <thead>
                            <tr>
                                <th width="450px">
                                    Produto
                                </th>
                                <th>
                                    Quantidade
                                </th>
                                <th>
                                    Preço Unitário
                                </th>
                            </tr>
                       </thead>
                       <tbody>';

        for($i=0;$i<$productNumber[0]['numero'];$i++){
            $html.='<tr>
                        <td>'
                                . $purchase['productspurchases'][$i]['product']['product_name'] .
                        '</td>
                         <td>'
                                . $purchase['productspurchases'][$i]['quantity'] .
                        '</td>
                         <td>'
                                . $purchase['productspurchases'][$i]['product']['price'] .
                         '</td>';
        }
        $html.='</tbody>
                </table><br><br><hr>';

        $html.= '<h3>Total:' . $purchase['total_price'] . '€</h3>';
        $dompdf->loadHtml($html);

        $dompdf->render();

        ob_end_clean();
        $dompdf->stream('relatorio.pdf',
        array(
            "Attachment"=>false
        ));

    }

}
