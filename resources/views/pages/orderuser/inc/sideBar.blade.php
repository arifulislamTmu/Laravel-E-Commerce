<div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <a href="{{ route('home') }}" class="btn btn-primary btn-block">Home</a>
        <a href="{{ route('order.details') }}" class="btn btn-success btn-block">Order Details</a>

        <a class="btn btn-danger btn-block" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
     </a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
     </form>

      </div>
    </div>
  </div>
