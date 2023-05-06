<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PrdtProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prdt-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'core_stock_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\modules\admin\models\CoreStock::find()->all(), 'id', 'name'),
        [
            'options' => [
               '1' => ['Selected' => true]
            ]
        ]
    )?>

    <?= $form->field($model, 'prdt_category_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\modules\admin\models\PrdtCategory::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Choose category',
//            'id' => 'test',
            'options' => [
//                '1' => ['Selected' => true]
            ]
        ]
    )?>

    <?= $form->field($model, 'prdt_brand_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\modules\admin\models\PrdtBrand::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Choose brand',
//            'id' => 'test',
            'options' => [
//                '1' => ['Selected' => true]
            ]
        ]
    )?>
    <?= $form->field($model, 'artikul')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'orginal_price')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput()->label('Discount (%)') ?>

    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
