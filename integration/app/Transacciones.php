<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transacciones extends Model{
    public function getTransacciones(){
        return DB::table('transacciones')->where('transactionState','')->orWhere('transactionState','PENDING')->get();
    }

    public static function updateTransacciones($data,$id){

        $result="Insertado";
        try{
            DB::beginTransaction();
            DB::table('transacciones')->where('transacciones.transactionID','=',$id)->update($data);
            DB::commit();
        }catch(Exception $e){
            if($e->getCode()==23000){
                $result="ErrorUnico";
            }else{
                $result="Error";
            }
            DB::rollback();
        }

        return $result;
    }
}
?>
