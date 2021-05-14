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
        <form class="form-inline" action="{{ route('produto.storebrand') }}" method="post">
          @csrf
          <select class="form-control mr-sm-4" name="brand_id">
            <option selected disabled>Selecionar marca...:</option>
            @foreach ($brands as $brand)
              <option value="{{ $brand->id }}">{{ $brand->marca }}</option>
            @endforeach
          </select>

          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

          <button type="submit" class="btn btn-success"> <i class="bi bi-plus-circle"></i> Aprovar</button>

        </form>
        <hr>

        <livewire:upload-photo :product="$product" />

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
