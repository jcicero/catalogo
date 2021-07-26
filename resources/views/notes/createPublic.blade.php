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
          <div>
            <form class="form-group" action="{{ route('notificar') }}" method="post">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="dtocorrencia">Data da Ocorrência</label>
                  <input type="date" class="form-control" name="dtocorrencia" value="{{ old('dtocorrencia') }}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="setor">Setor da Ocorrência</label>
                  <input type="text" class="form-control" name="setor" value="{{ old('setor') }}">
                </div>
                <div class="form-group col-md-4">
                  <label for="profissional">Profissional Notificante</label>
                  <input type="text" class="form-control" name="profissional" value="{{ old('profissional') }}">
                </div>
                <div class="form-group col-md-4">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-8">
                  <label for="product_id">Produto</label>
                  <input type="text" class="form-control" name="produtodesc" value="{{ old('produtodesc') }}">
                  {{-- 
                    <select class="form-control" name="product_id" id="product_id">
                      <option selected disabled>Selecionar produto...</option>
                      @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->descricao }}</option>
                      @endforeach
                    </select>
                  --}}

                </div>
                <div class="form-group col-md-4">
                  <label for="marca">Marca</label>
                  <input type="text" class="form-control" name="marca" value="{{ old('marca') }}">
                </div>
              </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="registroanvisa">Registro Anvisa</label>
                    <input type="text" class="form-control" name="registroanvisa" value="{{ old('registroanvisa') }}">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="lote">Lote</label>
                    <input type="text" class="form-control" name="lote" value="{{ old('lote') }}">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="validade">Validade</label>
                    <input type="text" class="form-control" name="validade" value="{{ old('validade') }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="queixa">Queixa Técnica</label>
                  <textarea class="form-control" name="queixa">{{ old('dtocorrencia') }}</textarea>
                </div>

                <input type="hidden" name="user_id" value="1">
                <input type="hidden" name="isAceito" value=false>

                                    
                <button class="btn btn-success form-control" type="submit"><i class="bi bi-exclamation-circle-fill"></i> Enviar Notificação</button>
          
            </form>
          </div>
        </div>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
      </div>
    </div>
  </div>
  
  @endsection