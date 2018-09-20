@extends('layout.app')
@section('title','INICIO')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4 col-xs-12">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top img-responsive" src="{{asset('img/controles.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <h3 class="card-title">Controles</h3>
                      <p>$ 10000</p>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <div class="text-center">
                      <a href="{{route('front.product.search',1)}}" class="btn btn-success">COMPRAR</a>
                      </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection