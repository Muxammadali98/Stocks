<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PrdtBrand */

$this->title = 'Create Prdt Brand';
$this->params['breadcrumbs'][] = ['label' => 'Prdt Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prdt-brand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
