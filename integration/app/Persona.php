<?php namespace App;
class Persona{
private $bankCode = '';
private $bankInterface = '';
private $returnURL ='';
private $reference = '';
private $description= ''; 
private $language='';
private $currency='';
private $totalAmount='';
private $taxAmount='';
private $devolutionBase='';
private $tipAmount='';
private $payer=array();
private $buyer=array();
private $shipping=array();
private $ipAddress='';
private $userAgent='';

public function setPayer($data){
    
    $this->payer= array(
        'documentType' =>$data['documentType'] ,
        'document' =>$data['document'] ,
        'firstName' =>$data['firstName'] ,
        'lastName' =>$data['lastName'] ,
        'company' =>$data['company'] ,
        'emailAddress' =>$data['emailAddress'] ,
        'address' =>$data['address'] ,
        'city'=>$data['city'] ,
        'province' =>$data['province'] ,
        'country' =>$data['country'] ,
        'phone' =>$data['phone'] ,
        'mobile' =>$data['mobile'] ,
        'postalCode' =>$data['postalCode'] ,
    );
}
public function setBuyer($data){
    $this->buyer= array(
        'documentType' =>$data['documentType'] ,
        'document' =>$data['document'] ,
        'firstName' =>$data['firstName'] ,
        'lastName' =>$data['lastName'] ,
        'company' =>$data['company'] ,
        'emailAddress' =>$data['emailAddress'] ,
        'address' =>$data['address'] ,
        'city'=>$data['city'] ,
        'province' =>$data['province'] ,
        'country' =>$data['country'] ,
        'phone' =>$data['phone'] ,
        'mobile' =>$data['mobile'] ,
        'postalCode' =>$data['postalCode'] ,
    );
}

public function setShipping($data){
    $this->shipping= array(
        'documentType' =>$data['documentType'] ,
        'document' =>$data['document'] ,
        'firstName' =>$data['firstName'] ,
        'lastName' =>$data['lastName'] ,
        'company' =>$data['company'] ,
        'emailAddress' =>$data['emailAddress'] ,
        'address' =>$data['address'] ,
        'city'=>$data['city'] ,
        'province' =>$data['province'] ,
        'country' =>$data['country'] ,
        'phone' =>$data['phone'] ,
        'mobile' =>$data['mobile'] ,
        'postalCode' =>$data['postalCode'] ,
    );
}
}
?>