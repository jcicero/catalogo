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
            <li class="list-group-item">
              <form class="form-inline" action="{{ route('produto.detachbrand') }}" method="post">
                @csrf
                @method('POST')
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <input type="hidden" name="brand_id" value="{{ $brand->id }}">
                  <input type="hidden" name="user_id" value="{{ $brand->pivot->user_id }}">
                
                  <div class="row">
                    <div class="col-sm-9">
                        <div class="raised-block">
                          {{ $brand->marca }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="raised-block">
                          <button type="submit" class="btn btn-outline-danger btn-sm"> <i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
              
                </form>
            </li>
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
            
            <x-note-form :product="$product" />

          </div>
        </div>
        <x-note-view :product="$product"/>
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
