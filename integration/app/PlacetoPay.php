<?php namespace App;
class PlaceToPay{
    private $auth;
    private $url="https://test.placetopay.com/soap/pse/?wsdl";
    public $servicio;

    public function __construct(){
        $this->auth=array(
            'login'=>ENV('LOGIN'),
            'tranKey'=>ENV('TRANKEY'),
            'seed'=>ENV('SEED')
        );
        
        $this->servicio=new \SoapClient($this->url);
    }
    public function BankList(){
        
        return $this->servicio->getBankList(['auth'=>$this->auth]);
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