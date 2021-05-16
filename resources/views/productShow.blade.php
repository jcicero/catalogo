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
        <hr>
        <p>
          <b>Marcas Pré-Aprovadas:</b>
        </p>
        <ul class="list-group">
          @forelse ($product->brands as $brand)
            <li class="list-group-item">{{ $brand->marca }}</li>
          @empty

          @endforelse
        </ul>
        <br>

          <x-brand-product-form :brands="$brands" :product="$product" />

        <hr>

          <livewire:upload-photo :product="$product" />

        <hr>
          <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="bi bi-bell"></i> Notificar
          </button>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-body">
            
            <x-notification-form :product="$product" />

          </div>
        </div>
        <x-notification-view :product="$product"/>
      </div>
    </div>
      <form class="form-inline" action="{{ route('produto.update',$product->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="active" value="false">
          <br><br><br>
        <button type="submit" class="btn btn-outline-danger"> <i class="bi bi-trash"></i> Desativar</button>
      </form>
  </div>
@endsection
