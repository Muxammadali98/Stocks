<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "prdt_product_activtiy".
 *
 * @property int $id
 * @property int $prdt_product_id
 * @property int $action
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PrdtProduct $prdtProduct
 */
class PrdtProductActivity extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at'
                ],
                'value' => new Expression('NOW()')
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prdt_product_activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prdt_product_id'], 'required'],
            [['prdt_product_id', 'action', 'status', 'count'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['prdt_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => PrdtProduct::className(), 'targetAttribute' => ['prdt_product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'prdt_product_id' => Yii::t('app', 'Prdt Product ID'),
            'action' => Yii::t('app', 'Action'),
            'status' => Yii::t('app', 'Status'),
            'count' => Yii::t('app', 'Count'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdtProduct()
    {
        return $this->hasOne(PrdtProduct::className(), ['id' => 'prdt_product_id']);
    }
}
