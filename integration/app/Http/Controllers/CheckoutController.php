<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Persona;
use App\Cuenta;
use App\Producto;

class CheckoutController extends Controller
{
    public function payment(Request $request){
        
        $this->validate($request,[
            'company'=>'required',
        ]);

        $persona=new Persona();
        //datos del pagador
        $payer=Cuenta::getPayer();
        $producto=Producto::getProductoById(1);
        dd($producto);

        $persona->bankCode=$request->bankCode;
        $persona->bankInterface=$request->bankInterface;
        
        $persona->language=ENV('LANGUAGE');
        $persona->currency=ENV('CURRENCY');
        $persona->totalAmount=$producto->price;
        $persona->taxAmount=$producto->price*$product->tax;
        $persona->devolutionBase=$producto->price;
        $persona->tipAmount='0,00';
        $persona->ipAddress='';
        $persona->userAgent='';
        
        //agrega datos payer al objeto de la transacción
        $persona->setPayer($payer);
        
        //agega datos del comprador al objeto cargados en el formulario
        $persona->setBuyer(['documentType'=>$request->documentType,
                            'document'=>$request->document,
                            'firstName'=>$request->firstName,
                            'lastName'=>$request->lastName,
                            'company'=>$request->company,
                            'emailAddress'=>$request->emailAddress,
                            'country'=>$request->country,
                            'province'=>$request->province,
                            'city'=>$request->city,
                            'address'=>$request->address,
                            'postalCode'=>'',
                            'phone'=>'',
                            'mobile'=>''
                            ]);
        $persona->setShipping(['documentType'=>$request->documentType,
                            'document'=>$request->document,
                            'firstName'=>$request->firstName,
                            'lastName'=>$request->lastName,
                            'company'=>$request->company,
                            'emailAddress'=>$request->emailAddress,
                            'country'=>$request->country,
                            'province'=>$request->province,
                            'city'=>$request->city,
                            'address'=>$request->address,
                            'postalCode'=>'',
                            'phone'=>'',
                            'mobile'=>''
                            ]);

        dd($persona);
    }
}
