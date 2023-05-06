<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;


/**
 * This is the model class for table "prdt_product".
 *
 * @property int $id
 * @property string $name
 * @property int $prdt_category_id
 * @property double $artikul
 * @property string $description
 * @property double $orginal_price
 * @property double $price
 * @property int $count
 * @property double $discount
 * @property int $prdt_brand_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PrdtBrand $prdtBrand
 * @property PrdtCategory $prdtCategory
 * @property PrdtProductActivity[] $PrdtProductActivitys
 */
class PrdtProduct extends \yii\db\ActiveRecord
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
        return 'prdt_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prdt_category_id', 'prdt_brand_id','core_stock_id'], 'required'],
            [['prdt_category_id', 'count', 'prdt_brand_id'], 'integer'],
            [['artikul', 'orginal_price', 'price', 'discount'], 'number'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['prdt_brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => PrdtBrand::className(), 'targetAttribute' => ['prdt_brand_id' => 'id']],
            [['prdt_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PrdtCategory::className(), 'targetAttribute' => ['prdt_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'prdt_category_id' => Yii::t('app', 'Prdt Category ID'),
            'artikul' => Yii::t('app', 'Artikul'),
            'description' => Yii::t('app', 'Description'),
            'orginal_price' => Yii::t('app', 'Orginal Price'),
            'price' => Yii::t('app', 'Price'),
            'count' => Yii::t('app', 'Count'),
            'discount' => Yii::t('app', 'Discount'),
            'prdt_brand_id' => Yii::t('app', 'Prdt Brand ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdtBrand()
    {
        return $this->hasOne(PrdtBrand::className(), ['id' => 'prdt_brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdtCategory()
    {
        return $this->hasOne(PrdtCategory::className(), ['id' => 'prdt_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdtProductActivitys()
    {
        return $this->hasMany(PrdtProductActivity::className(), ['prdt_product_id' => 'id']);
    }
}
