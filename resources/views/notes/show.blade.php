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
                  <label for="dtocorrencia">Data da OcorrĂȘncia</label>
                  <input type="date" class="form-control" name="dtocorrencia" value="{{ $note->getRawOriginal('dtocorrencia') }}">
                </div>
                <div class="form-group col-md-10">
                  <label for="product_id">Produto</label>
                  <div wire:ignore>
                    <select name="product_id" id="product_id" class="form-control product_id">
                      @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->descricao }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="setor">Setor da OcorrĂȘncia</label>
                  <input type="text" class="form-control" name="setor" value="{{ $note->setor }}">
                </div>
                <div class="form-group col-md-4">
                  <label for="profissional">Profissional Notificante</label>
                  <input type="text" class="form-control" name="profissional" value="{{ $note->profissional }}">
                </div>
                <div class="form-group col-md-4">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" name="email" value="{{ $note->email }}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-8">
                  <label for="produtodesc">Produto</label>
                  <input type="text" class="form-control" name="produtodesc" value="{{ $note->produtodesc }}">
                  
                </div>
                <div class="form-group col-md-4">
                  <label for="marca">Marca</label>
                  <input type="text" class="form-control" name="marca" value="{{ $note->marca }}">
                </div>
              </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="registroanvisa">Registro Anvisa</label>
                    <input type="text" class="form-control" name="registroanvisa" value="{{ $note->registroanvisa }}">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="lote">Lote</label>
                    <input type="text" class="form-control" name="lote" value="{{ $note->lote }}">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="validade">Validade</label>
                    <input type="text" class="form-control" name="validade" value="{{ $note->validade }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="queixa">Queixa TĂ©cnica</label>
                  <textarea class="form-control" name="queixa">{{ $note->queixa }}</textarea>
                </div>

                <input type="hidden" name="user_id" value="1">
                <input type="hidden" name="isAceito" value=false>

                                    
                <button class="btn btn-success form-control" type="submit"><i class="bi bi-exclamation-circle-fill"></i> Enviar NotificaĂ§ĂŁo</button>
          
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

@push('scripts')
  
@endpush