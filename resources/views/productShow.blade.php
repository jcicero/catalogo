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

        <hr>
          <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="bi bi-bell"></i> Notificar
          </button>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-body">
            <form class="form-group" action="{{ route('notifications.store') }}" method="post">
              @csrf
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="anvisa">Protocolo ANVISA</label>
                    <input type="text" class="form-control" name="anvisa">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="sei">Nº Processo</label>
                    <input type="text" class="form-control" name="sei">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="dtocorrencia">Data</label>
                    <input type="date" class="form-control" name="dtocorrencia">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="setor">Setor</label>
                    <input type="text" class="form-control" name="setor">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="profissional">Profissional</label>
                    <input type="text" class="form-control" name="profissional">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="brand_id">Marca</label>
                    <select class="form-control" name="brand_id">
                      <option selected disabled>Selecionar marca...:</option>
                      @foreach ($product->brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->marca }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="registroanvisa">Registro Anvisa</label>
                    <input type="text" class="form-control" name="registroanvisa">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="lote">Lote</label>
                    <input type="text" class="form-control" name="lote">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="validade">Validade</label>
                    <input type="text" class="form-control" name="validade">
                  </div>
                </div>
                <div class="form-group">
                  <label for="queixa">Queixa Técnica</label>
                  <textarea class="form-control" name="queixa"></textarea>
                </div>

                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                          
                <button class="btn btn-success form-control" type="submit"><i class="bi bi-image"></i> Salvar</button>

            </form>
          </div>
        </div>

        <table class="table table-sm">
          <thead>
            <tr>
              <th scope="col">Data</th>
              <th scope="col">Protocolo ANVISA / Processo</th>
              <th scope="col">Setor</th>
              <th scope="col">Profissional</th>
              <th scope="col">Empresa</th>
              <th scope="col">Marca</th>
              <th scope="col">Registro ANVISA</th>
              <th scope="col">Lote</th>
              <th scope="col">Validade</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($product->notifications as $notification)
              <tr>
                <td>{{ $notification->dtocorrencia }}</td>
                <td>{{ $notification->anvisa . ' / ' . $notification->sei }}</td>
                <td>{{ $notification->setor }}</td>
                <td>{{ $notification->profissional }}</td>
                <td>{{ $notification->brand->company->cnpj ?? '' }} {{ $notification->brand->company->empresa ?? '' }}</td>
                <td>{{ $notification->brand->marca }}</td>
                <td>{{ $notification->registroanvisa }}</td>
                <td>{{ $notification->lote }}</td>
                <td>{{ $notification->validade }}</td>
              </tr>
              <tr>
                <td colspan="9">{{ $notification->queixa }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
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
