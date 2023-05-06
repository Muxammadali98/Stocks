<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PrdtCategory */

$this->title = 'Create Prdt Category';
$this->params['breadcrumbs'][] = ['label' => 'Prdt Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prdt-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
