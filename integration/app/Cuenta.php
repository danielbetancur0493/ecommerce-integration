<?php namespace App;
    class Cuenta{
        public static function getPayer(){
            $payer = array(
                'documentType'=>'CC',
                'document'=>'1045048995',
                'firstName'=>'Daniel',
                'lastName'=>'Ceballos',
                'company'=>'',
                'emailAddress'=>'danielbetancur0493@gmail.com',
                'address'=>'cll 24 # 22-22',
                'city'=>'Medellin',
                'province'=>'Antioquia',
                'country'=>'Colombia',
                'phone'=>'2700403',
                'mobile'=>'3232900948',
                'postalCode'=>'050002'
            );
            return $payer;
        }
    }
?>