@extends('layouts.app')

@section('content')

  <br>
  <div class="col-md-12">
    <div class="card text-left">
      <div class="card-header">
        <b>{{ $product->codigo }} -
          @if ($product->resumida)
            {{ $product->resumida }}
          @else
            {{ $product->descricao }}
          @endif
        </b>
      </div>
      <div class="card-body">
        <p>
          <b> Descrição completa: </b> {{ $product->descricao }}
        </p>
        <p>
          <b>Categoria: </b> {{ $product->category->categoria }}
        </p>

        <livewire:upload-photo :product="$product" />

      </div>
    </div>
  </div>
@endsection
