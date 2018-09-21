<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Persona;
use App\Cuenta;
use App\Producto;
use App\PlaceToPay as Payment;
use App\Transacciones as Transaccion;

class CheckoutController extends Controller
{
    public function payment(Request $request){
        
         $this->validate($request,[
            'documentType'=>'required|not_in:0', 
            'document'=>'required',
            'firstName'=>'required',
            'lastName'=>'required',
            'emailAddress'=>'required',
            'mobile'=>'required',
            'phone'=>'required',
            'country'=>'required',
            'province'=>'required',
            'city'=>'required',
            'address'=>'required',
            'postalCode'=>'required',
            'bankCode'=>'required|in:1022',
            'bankInterface'=>'required',
         ]);
            
        $persona=new Persona();
        //datos del pagador
        $payer=Cuenta::getPayer();
        $producto=Producto::getProductoById(1);
        $request->language=ENV('LANGUAGE');
        $request->currency=ENV('CURRENCY');
        $request->returnURL=url('/checkout/transaction/');
        $request->ipAddress=$_SERVER['REMOTE_ADDR'];
        $request->userAgent=$_SERVER['HTTP_USER_AGENT'];
        $request->reference=$producto['sku'];
        $request->description=$producto['name'];
        $request->totalAmount=$producto['price'];
        $request->taxAmount=$producto['tax'];
        $request->devolutionBase=$producto['tax'];
        $request->tipAmount='0,19';
        
        $persona->setInfo($request);
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
                            'postalCode'=>$request->postalCode,
                            'phone'=>$request->phone,
                            'mobile'=>$request->mobile
                            ]);

        $payment=new Payment();
        $response=$payment->CreaTransaction($persona);
        if(isset($response->createTransactionResult)){
            $transaccion=new Transaccion();
            $transaccion->returnCode=$response->createTransactionResult->returnCode;
            $transaccion->bankURL=$response->createTransactionResult->bankURL;
            $transaccion->transactionID=$response->createTransactionResult->transactionID;
            $transaccion->responseReasonText=$response->createTransactionResult->responseReasonText;
            $transaccion->requestDate='';
            $transaccion->bankProcessDate='';
            $transaccion->transactionState='';
            $transaccion->save();
            return redirect()->to($response->createTransactionResult->bankURL);
        }else{
            Session::flash('warning','No existe el ID');
            return back()->withInput();
        }
        
    }

    public function transaction(){
        $payment=new Payment();
        $transaccion=new Transaccion();
        $items=$transaccion->getTransacciones();
        
        if(count($items)>0){
            
            for($i=0;$i<count($items);$i++){
                
                $response[$i]=$payment->getTransaccion($items[$i]->transactionID);
                
                $transaccion->updateTransacciones(['requestDate'=>$response[$i]->getTransactionInformationResult->requestDate,
                                                    'bankProcessDate'=>$response[$i]->getTransactionInformationResult->bankProcessDate,
                                                    'transactionState'=>$response[$i]->getTransactionInformationResult->transactionState,
                                                    'ResponseReasonText'=>$response[$i]->getTransactionInformationResult->responseReasonText
                                                    ],$response[$i]->getTransactionInformationResult->transactionID);
            }
        }
        
        
        return redirect('checkout/transaction/list');
    }


    public function list(){
        $transaccion=new Transaccion();
        $items=$transaccion->get();
        return view('front.list',['items'=>$items]);
    }
    
}
