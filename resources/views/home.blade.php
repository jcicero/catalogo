@extends('layouts.app')

@section('content')
<br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Novidades') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <ul>
              <li>Cadastro de Marcas</li>
              <li>Inclusão de fotos</li>
              <li>Marcas aprovadas por produto</li>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
