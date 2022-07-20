@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Dashboard') }}</div>

              <div class="card-body d-flex flex-column">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  {{ __('You are logged in!') }}
                  <a href=" {{ route('generate.index') }} " class="btn btn-primary my-3">Generate Link</a>
                </div>
          </div>
      </div>
  </div>
</div>
@endsection


@extends('components.sidebar')

@extends('components.user')
