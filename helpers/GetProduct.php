<?php
namespace app\helpers;

trait GetProduct{

    public function get($data)
    {
        $response = [];
            foreach($data as $product){
                $response[] = $product->prdtProduct;
            }
          
        return $response;
    }

}

?>