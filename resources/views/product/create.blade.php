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
          <form class="form-group" action="{{ route('produto.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="category_id">Categoria: </label>
              <select name="category_id" class="form-control">
                  <option selected disabled>Selecione uma categoria...</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}"> {{ $category->categoria }}</option>
                @endforeach
              </select>

              <label for="descricao">Descrição completa: </label>
              <textarea name="descricao" class="form-control"></textarea>

              <label for="resumida">Descrição resumida: </label>
              <input name="resumida" type="text" class="form-control">

              <label for="apresentacao">Apresentação: </label>
              <input name="apresentacao" type="text" class="form-control">

              <label for="codigo">Código/CATMAT: </label>
              <input name="codigo" type="text" class="form-control">

              <label for="classification">Classificação XYZ: </label>
              <select name="classification" class="form-control">
                  <option selected disabled>Selecione uma classificação...</option>
                  <option value="X"> X - Baixa Criticidade </option>
                  <option value="Y"> Y - Média Criticidade </option>
                  <option value="Z"> Z - Alta Criticidade </option>
              </select>

              <input name="user_id" type="hidden" value="{{ auth()->user()->id }}" class="form-control">

              <button type="submit" class="btn btn-success"> <i class="bi bi-plus-circle"></i> Cadastrar</button>
            </div>
            <br>
            @if ($errors->any())
              <ul>
                <div class="alert alert-danger col-md-3" role="alert">
                  @error('marca')
                    {{ $message }}
                  @enderror
                </div>
              </ul>
            @endif
            @if (session()->has('message'))
              <div class="alert alert-success col-md-3" role="alert">
                {{ session('message') }}
              </div>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
