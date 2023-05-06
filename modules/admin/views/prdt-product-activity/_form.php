<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PrdtProductActivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prdt-product-activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prdt_product_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\modules\admin\models\PrdtProduct::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Choose Product',
//            'id' => 'test',
            'options' => [
//                '1' => ['Selected' => true]
            ]
        ]
    )?>
    <?= $form->field($model, 'action')->dropDownList(
       [
        1 => 'Ation', 2 => 'Left'
       ],
       [
            'prompt' => 'Choose action',
//            'id' => 'test',
            'options' => [
               '1' => ['Selected' => true]
            ]
        ]
    )?>

    <?= $form->field($model, 'status')->dropDownList(
       [
        1 => 'Sold', 2 =>'Order'
       ],
       [
            'prompt' => 'Choose action',
//            'id' => 'test',
            'options' => [
               '1' => ['Selected' => true]
            ]
        ]
    )?>
     <?= $form->field($model, 'count')->textInput() ?>
    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
