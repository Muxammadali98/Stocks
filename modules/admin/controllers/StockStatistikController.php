<?php

namespace app\modules\admin\controllers;

use app\helpers\FilterProduct;
use app\helpers\GetProduct;
use app\modules\admin\models\CoreStock;
use app\modules\admin\models\PrdtCategory;
use app\modules\admin\models\PrdtProduct;
use app\modules\admin\models\PrdtProductActivity;
use mdm\admin\models\form\Login;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class StockStatistikController extends Controller
{
    use GetProduct;
    use FilterProduct;
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex( )
    {
        $category=\Yii::$app->request->get('category');
        $stock=\Yii::$app->request->get('stock');
        $action=\Yii::$app->request->get('action');

        $activity  = PrdtProductActivity::find();
        $products = PrdtProduct::find();
        $data = [];
     
        if( $action !== null and $action !== '' ){
        
            $activity = $activity->where(['in','status',$action]);
            $data = $activity->select('prdt_product_id')->distinct('prdt_product_id')->column();

        }
        if(!is_null($category)){
         
            $products = $products->where(['prdt_category_id'=>$category]);
        }

        if(!is_null($stock) and !empty($stock) ){
            $products = $products->where(['core_stock_id'=>$stock]);
        }
        if(!empty($data)){
            $products = $products->where(['in','id',$data]);
        }



        $products = $products->all();

        $orderProduct = PrdtProductActivity::find()->andWhere(['in','status',0])->andWhere(['between','created_at',date('Y-m-d '), date('Y-m-d H:i:s')])->all();
        $saleProduct = PrdtProductActivity::find()->andWhere(['in','status',1])->andWhere(['between','created_at',date('Y-m-d '), date('Y-m-d H:i:s')])->with('prdtProduct')->all();
        $categores = PrdtCategory::find()->all();
        $coreStocks = CoreStock::find()->all();

   
        return $this->render('index', compact('products','coreStocks','orderProduct','saleProduct', 'categores'));
    }

    /**
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->getUser()->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'login';
        $model = new Login();

        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    public function actionFilter($id=0)
    {     
        $from = $_POST;
        return var_dump($from,$id);
        $products = PrdtProduct::find()->andWhere(['in','prdt_category_id',])->andWhere(['in','artikul',$id])->all();
       
     
        $inStock = PrdtProduct::find()->where(['in','artikul',0])->all();
        $saleProduct = PrdtProduct::find()->where(['in','artikul',1])->all();
        $categores = PrdtCategory::find()->all();
        return $this->render('index', compact('products', 'inStock','saleProduct', 'categores'));
    }

}
