@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      <strong>Well done!</strong> {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('inform'))
    <div class="alert alert-info" role="alert">
      <strong>Heads up!</strong> {{ Session::get('inform') }}
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning" role="alert">
      <strong>Warning!</strong> {{ Session::get('warning') }}
    </div>
@endif

@if (Session::has('failure'))
    <div class="alert alert-danger" role="alert">
      <strong>Oh snap!</strong> {{ Session::get('failure') }}
    </div>
@endif