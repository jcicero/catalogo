@extends('layouts.app')

@section('content')

  <div>
    <div class="col-md-12">
      <br>
      <div class="card">
        <div class="card-header">
          <b>{{ $title }}</b>
        </div>
        <div class="card-body">
          <p>
            <b> Descrição completa: </b> {{ $product->descricao }}
          </p>
          <p>
            <b> Categoria: </b> {{ $product->category->categoria }}
          </p>
          <hr>
        </div>

      </div>
    </div>
  </div>
  
  @endsection