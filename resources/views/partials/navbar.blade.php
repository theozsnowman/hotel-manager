<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">Chique na Roça</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item{{ request()->is('customers*') ? ' active' : '' }}">
        <a class="nav-link" href="/customers">Clientes</a>
      </li>
      <li class="nav-item{{ request()->is('rooms*') ? ' active' : '' }}">
        <a class="nav-link" href="/rooms">
          Quartos
        </a>
      </li>
      <li class="nav-item{{ request()->is('products*') ? ' active' : '' }}">
        <a class="nav-link" href="/products">
          Produtos
        </a>
      </li>
      <li class="nav-item{{ request()->is('bookings*') ? ' active' : '' }}">
        <a class="nav-link" href="/bookings">
          Reservas
        </a>
      </li>
      <li class="nav-item{{ request()->is('consumption*') ? ' active' : '' }}">
        <a class="nav-link" href="/consumption">
          Consumos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Estoque
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ action('StockController@index') }}">Ver Estoque</a>
          <a class="dropdown-item" href="{{ action('StockController@create') }}">Movimentar Estoque</a>
        </div>
      </li>
      <li class="nav-item">
        <a href="/reports" class="nav-link">Relatórios</a>
      </li>
    </ul>
  </div>
</nav>
