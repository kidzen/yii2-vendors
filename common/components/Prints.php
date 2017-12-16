<?php

namespace common\components;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use common\models\People;
use common\models\InventoryItems;

/**
 * This is the model class for table "INVENTORY_ITEMS".
 *
 * @property string $ID
 * @property integer $INVENTORY_ID
 * @property integer $CHECKIN_TRANSACTION_ID
 * @property integer $CHECKOUT_TRANSACTION_ID
 * @property string $SKU
 * @property string $UNIT_PRICE
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 * @property integer $CREATED_BY
 * @property integer $UPDATED_BY
 * @property integer $DELETED
 * @property string $DELETED_AT
 */
class Prints {

    /**
     * @inheritdoc
     */
    const STATUS_DELETED = 1;
    const STATUS_ACTIVE = 0;

     public static function barcodeSku($id) {
//        $sku = static::find()
//                ->select('INVENTORY_ITEMS.ID,INVENTORY_ITEMS.SKU,INVENTORIES.CODE_NO')
//                ->joinWith('inventory')
//                ->where(['INVENTORY_ITEMS.ID' => $id])
//                ->asArray()
//                ->all();
//        var_dump($sku);
        $data = InventoryItems::findOne($id);
//        var_dump($data->inventory->DESCRIPTION);die();
//        $pdf = new \kartik\mpdf\Pdf();
//        $mpdf = $pdf->getApi('utf-8', array(190,236));
        $mpdf = new \mPDF('utf-8', array(50, 20), 0, '', 1, 1, 4, 1, 0.5, 0, 'P');
//        $mpdf = new \mPDF('utf-8', 'A4', 0, '', 1, 1, 4, 1, 0.5, 0, 'P');
//        $mpdf = new \mPDF('utf-8', 'A4');
//        $mpdf = new \mPDF('utf-8', 'A4', 0, '', 15, 15, 16, 16, 9, 9, 'L');
        $mpdf->defaultheaderfontsize = 5;
        $mpdf->defaultfooterfontsize = 5;
        $mpdf->SetHeader('|© Majlis Perbandaran Seberang Perai|');
//        $mpdf->SetFooter('|© Majlis Perbandaran Seberang Perai|');
//        $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML(''
                . 'barcode {padding: 1.5mm;margin: 0;vertical-align: top;color: #000044;}'
                . '.barcodecell {text-align: center;vertical-align: middle;}'
                , 1);
        $mpdf->WriteHTML(''
                . '<div style="text-align:center;font-size:8px">' . $data->inventory->DESCRIPTION . '</div>'
                . '<div class="barcodecell">'
                . '<barcode class="barcode" code="' . $data->inventory->CODE_NO . '" type="C128A" size="0.5" height="0.5"/></div>'
                . '<div style="text-align:center;font-size:6px;">CODE : ' . $data->inventory->CODE_NO . '</div>'
                . '<div class="barcodecell">'
                . '<barcode class="barcode" code="' . $data->SKU . '" type="C128A" size="0.5" height="0.5"/></div>'
                . '<div style="text-align:center;font-size:6px">SKU : ' . $data->SKU . '</div>'
                , 2);
        $mpdf->AddPage();
        $mpdf->WriteHTML(''
                . '<div style="text-align:center;font-size:8px">' . $data->inventory->DESCRIPTION . '</div>'
                . '<div style="color:white;text-align:center;padding:2px;">'
                . '<barcode code="' . $data->inventory->CODE_NO . '" type="C128A" size="0.5" height="0.5"/></div>'
                . '<div style="text-align:center;font-size:6px;">CODE : ' . $data->inventory->CODE_NO . '</div>'
                . '<div style="color:white;text-align:center;padding:2px;">'
                . '<barcode code="' . $data->SKU . '" type="C128A" size="0.5" height="0.5"/></div>'
                . '<div style="text-align:center;font-size:6px">SKU : ' . $data->SKU . '</div>'
        );
        $mpdf->Output();
//        return $sku;
    }

}
