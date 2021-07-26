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
          <form class="form-group" action="{{ route('companies.store') }}" method="post">
            @csrf
            <div class="form-inline">
              <label for="marca">CNPJ: </label>
              <input name="cnpj" type="text" class="form-control">

              <label for="empresa">Empresa: </label>
              <input name="empresa" type="text" class="form-control">

              <label for="telefone">Telefone: </label>
              <input name="telefone" type="text" class="form-control">
            </div>
            <div class="form-inline">
              <label for="email">E-mail: </label>
              <input name="email" type="text" class="form-control">

              <label for="url">Site: </label>
              <input name="url" type="text" class="form-control">
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
    <br>
    <div class="col-md-12">
      <div class="card text-left">
        <div class="card-header">
          <b>{{ $title }}</b>
        </div>
        <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">CNPJ</th>
              <th scope="col">Empresa</th>
              <th scope="col">Telefone</th>
              <th scope="col">E-mail</th>
              <th scope="col">Site</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($companies as $company)
              <tr>
                <td>{{ $company->cnpj }}</td>
                <td>{{ $company->empresa }}</td>
                <td><a href="tel:{{ $company->telefone }}">{{ $company->telefone }}</a></td>
                <td><a href="mailto:{{ $company->email }}">{{ $company->email }}</a></td>
                <td><a href="https://{{ $company->url }}">{{ $company->url }}</a></td>
                <td>
                  <a href="{{ route('companies.show', $company->id) }}">
                    <i class="bi bi-eye-fill btn btn-outline-success btn-sm"></i>
                  </a>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>

@endsection
