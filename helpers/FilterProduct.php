<?php

namespace app\helpers;

trait FilterProduct{
    public function filter($data, $id)
    {
        $response = [];
        foreach($data as $product){
            if($product->prdt_category_id == $id){
                $response[] =  $product;
            }
        }
        return $response;
    }
}