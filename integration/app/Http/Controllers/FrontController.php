<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use Carbon\carbon;
use App\Producto as Producto;
use App\PlaceToPay as Payment;

class FrontController extends Controller
{
    public function __construct(){
		Carbon::setLocale('es');
    }
    
    public function index(){
        return view('front.home');
    }

    public function cart($id){
        
        $payment=new Payment();
        $bankList=$payment->BankList();
        
        if(isset($id)){
            $result=Producto::getProductoById($id);
            return view('front.checkout',['result'=>$result,'bankList'=>$bankList]);
        }else{
            Session::flash('warning','No existe el ID');
            return redirect('/');
        }
    }
}
