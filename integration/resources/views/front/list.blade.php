@extends('layout.app')
@section('title','LISTA DE ORDENES')
@section('content')
    <table class="table">
        <thead>
            <tr>
              <th>ID TRANSACCION</th>
              <th>ESTADO</th>
              <th>FECHA SOLICITUD</th>
              <th>FECHA PROCESADA</th>
              <th>DESCRIPCIÓN</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
                @forelse ($items as $row)
                
          <tr class="@if($row->transactionState=='OK'){{"success"}}
                        
                    @elseif($row->transactionState=='PENDING'){{"info"}} 
                    
                    @else
                
                {{"danger"}}
            @endif">
                <td>{{$row->transactionID}}</td>
                <td>{{$row->transactionState}}</td>
                <td>{{$row->requestDate}}</td>
                <td>{{$row->bankProcessDate}}</td>
                <td><small>{{$row->ResponseReasonText}}</small></td>
                <td>@if($row->transactionState == '' || $row->transactionState == 'PENDING')
                <a href="{{$row->bankURL}}" class="btn btn-warning">IR A PSE</a>
                    @endif
                </td>
                <tr>
                @empty
                <tr>
                <td colspan="3">NO SE ENCONTRARON RESULTADOS</td>
                </tr>
                @endforelse
            <tr class="success">
                
              </tr>
          </tbody>
    </table>
@endsection
