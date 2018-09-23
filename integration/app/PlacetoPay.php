<?php namespace App;
/**
 * Script que permite integracion con placetopay y pse
 * BankList devuelve o actualiza la cache de la lista de bancos
 * CreaTransaction se encarga de enviar parametros para crear una transaccion y pemitir redirigir el usuario
 * getTransaccion Permite conocer el estado de las transacciones
 */
use Illuminate\Support\Facades\Cache;

class PlaceToPay{
    private $auth;
    private $url="https://test.placetopay.com/soap/pse/?wsdl";
    public $servicio;

    public function __construct(){
        /**
         * configurar autenticación del servicio y crea servicio como cliente
         */
        $this->auth=array(
            'login'=>ENV('LOGIN'),
            'tranKey'=>ENV('TRANKEY'),
            'seed'=>ENV('SEED')
        );
        
        $this->servicio=new \SoapClient($this->url);
    }
    public function BankList(){
        /**
         * la variable result es cargada de la información que contiene en memoria cache el key BankList
         * si el tiempo se ha agotado, el cache es cargado nuevamente con la información del servicio
         */
        $result=Cache::get('BankList',function()  {
            $data=$this->servicio->getBankList(['auth'=>$this->auth]);
            Cache::put('BankList',$data->getBankListResult->item,1440);
            return Cache::get('BankList');
        });
        return $result;
        
    }
    public function CreaTransaction($data){
        try{
            return $this->servicio->createTransaction(['auth'=>$this->auth,
                                            'transaction'=>$data,
                                            ]);
        }catch(SoapFault $fault){
            return $fault->getMessage();
        }
        
    }
    
    public function getTransaccion($id){
        return $this->servicio->getTransactionInformation(['auth'=>$this->auth,'transactionID'=>$id]);
    }
}
?>