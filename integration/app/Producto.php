<?php namespace App;

use Illuminate\Database\Eloquent\Model;
class Producto extends Model{
    
    

    public static function getProductoById($id){
        $product=['sku'=>'cg'.$id,'name'=>'Controles Gaming','price'=>'10000,00','tax'=>'0,19','discount'=>'0,0'];
        return $product;
    }
}

?>