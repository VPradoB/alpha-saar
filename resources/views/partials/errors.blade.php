@if($errors->has())
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    @foreach ($errors->all() as $error)
          {{ $error }}<br>
    @endforeach
            </div>
@endif

@if(session()->has('status'))

        <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          {{ session('status') }}

            </div>
@endif