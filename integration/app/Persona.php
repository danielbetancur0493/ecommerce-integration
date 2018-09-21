<?php namespace App;
class Persona{
private $bankCode ;
private $bankInterface ;
private $returnURL ;
private $reference ;
private $description; 
private $language;
private $currency;
private $totalAmount;
private $taxAmount;
private $devolutionBase;
private $tipAmount;
private $payer;
private $buyer;
private $shipping;
private $ipAddress;
private $userAgent;

public function setInfo($data){
    $this->bankCode=$data->bankCode;
    $this->bankInterface=$data->bankInterface;
    $this->returnURL=$data->returnURL;
    $this->reference=$data->reference;
    $this->description=$data->description;
    $this->language=$data->language;
    $this->currency=$data->currency;
    $this->totalAmount=$data->totalAmount;
    $this->taxAmount=$data->taxAmount;
    $this->devolutionBase=$data->devolutionBase;
    $this->tipAmount=$data->tipAmount;
    $this->ipAddress=$data->ipAddress;
    $this->userAgent=$data->userAgent;
}

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