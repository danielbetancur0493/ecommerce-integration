@extends('layout.app')
@section('title','CHECKOUT')
@section('content')
<div class="row">
    <div class="col-sm-4 col-xs-12">
        <h3 class="text-center">DETALLE DE LA COMPRA</h3>    
        <div class="card">
                <img class="card-img-top img-responsive" src="{{asset('img/controles.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">{{$result['name']}}</h3>
                    <p>Valor de la compra: $ {{$result['price']}}</p>
                    <p>Impuesto: % {{$result['tax']}}</p>
                    <p>Descuento: $ {{$result['discount']}}</p>
                </div>
            </div>
    </div>
    <div class="col-sm-8">
        
        <form action="{{route('checkout.payment')}}" method="POST" >
                {{csrf_field()}}
          <div class="row">
            <div class="col-md-4 col-xs-12">
            <div class="form-group">
                    <label for="documentType">Tipo Documento</label>
                <select class="form-control" name="documentType">
                    <option value="0">Seleccione una opción</option>
                    <option value="CC">CC</option>
                    <option value="NIT">NIT</option>
                </select>
            </div>
            </div>

            <div class="col-md-8 col-xs-12">
                <div class="form-group">
                    <label for="document">Nro Documento</label>
                <input type="text" name="document" maxlength="10" class="form-control" placeholder="Nro documento" value="{{old('document')}}" required>
                </div>
            </div>
                    
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="firstName">Nombre</label>
                <input type="text" name="firstName" placeholder="Nombre" maxlength="50" class="form-control" value="{{old('firstName')}}" required>
                </div>
            </div>
            
            <div class="col-md-4 col-xs-12">
            <div class="form-group">
                <label for="lastName">Apellido</label>
            <input type="text" name="lastName" maxlength="50" class="form-control" value="{{old('lastName')}}" required>
            </div>
            </div>

            <div class="col-md-4 col-xs-12">
            <div class="form-group">
                <label for="company">Compañia</label>
            <input type="text" name="company" maxlength="60" class="form-control" value="{{old('company')}}">
            </div>
            </div>
            
            <div class="col-md-4 col-xs-12">
                    <div class="form-group">
                            <label for="emailAddress">Dirección Email</label>
                    <input type="email" name="emailAddress" class="form-control" id="emailAddress" placeholder="Email" value="{{old('emailAddress')}}" required>
                    </div>
            </div>

            <div class="col-md-4 col-xs-12">
            <div class="form-group">
                <label for="phone">Teléfono Fijo</label>
                <input type="number" class="form-control" maxlength="15" name="phone" placeholder="Telefono fijo" required>
            </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="password">Teléfono Movil</label>
                    <input type="number"  class="form-control" maxlength="20" name="mobile" placeholder="Telefono movil" required>
                </div>
                </div>

            <div class="col-md-6 col-xs-12">
            <div class="form-group">
                <label for="country">País</label>
            <input type="text" name="country" maxlength="60" class="form-control" placeholder="País" value="{{old('country')}}" required>
            </div>
            </div>

            <div class="col-md-6 col-xs-12">
            <div class="form-group">
                <label for="province">Departamento</label>
            <input type="text" name="province" maxlength="60" class="form-control" value="{{old('province')}}" placeholder="Departamento" required>
            </div>
            </div>

            <div class="col-md-4 col-xs-12">
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" name="city" maxlength="60" class="form-control" placeholder="Ciudad" value="{{old('city')}}" required>
            </div>
            </div>

            <div class="col-md-4 col-xs-12">
            <div class="form-group">
                <label for="address">Dirección</label>
            <input type="text" name="address" maxlength="80" class="form-control" placeholder="Dirección" value="{{old('address')}}" required>
            </div>
            </div>

            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="postalCode">Codigo Postal</label>
                <input type="text" name="postalCode" maxlength="15" class="form-control" placeholder="Dirección" value="{{old('address')}}" required>
                </div>
                </div>
            
            <div class="col-xs-8">
                <label for="bankCode">Banco</label>
                <select name="bankCode" class="form-control">
                    @foreach($bankList as $row)
                        {{print("<option value='$row->bankCode'>$row->bankName</option>")}}
                    @endforeach
                </select>
            </div>
            <div class="col-xs-4">
                <label for="bankInterface">Tipo</label>
                <select name="bankInterface" class="form-control">
                    <option value="0">Persona</option>
                    <option value="1">Empresa</option>
                </select>
            </div>
            
          </div>
          <br>
          <div class="col-md-12">
            <img src="{{asset('/img/pse.png')}}" alt="pse" style="width:150px;">
          </div>
          
          <div class="col-md-12">
            <button type="submit" class="btn btn-success">REALIZAR PAGO</button>
            <p>
              Al dar clic en el botón <mark class="bg-danger">REALIZAR PAGO</mark> acepta terminos y condiciones.
            </p>
          </div>
                    
                        
                    
                </div>
          </div>
                    
            
        </form>
    </div>
</div>

@endsection
@section('js')
<script>
        $('div.alert').not('.alert-important').delay(5000).fadeOut(850);
    </script>
@endsection
