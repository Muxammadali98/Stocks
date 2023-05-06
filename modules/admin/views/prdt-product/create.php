<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PrdtProduct */

$this->title = 'Create Prdt Product';
$this->params['breadcrumbs'][] = ['label' => 'Prdt Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prdt-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
