<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="{{route('front.index')}}">
          <small class="text-success">ECOMMERCE</small>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
        <li><a href="{{url('/checkout/transaction')}}">Lista de Transacciones</a></li>
          <li><a href="{{url('/listacache')}}">Lista de Bancos</a></li>
        </ul>
      </div>
    </div>
  </nav>