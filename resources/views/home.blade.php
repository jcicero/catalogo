@extends('layouts.app')

@section('content')
<br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        @if($notes->isNotEmpty())
          <div class="card" >
            <div class="card-header">
              {{ __('Notificações') }}
            </div>
            <ul class="list-group list-group-flush">
              @foreach ($notes as $note)
              <li class="list-group-item">
                {{ $note->dtocorrencia . ' - ' . $note->produtodesc }} 
                  <a 
                    class="btn btn-primary btn-sm" 
                    href="{{ route('notes.show', $note->id) }}" 
                    role="button"> 
                      <i class="bi bi-check-square-fill"></i> 
                      Avaliar
                  </a>
              </li>
              @endforeach
            </ul>
          </div>
          <br>
        @endif

        <div class="card">
          <div class="card-header">{{ __('Novidades') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <ul>
              <li>Listar produtos por categoria</li>
              <li>Cadastro de Marcas</li>
              <li>Inclusão de fotos</li>
              <li>Marcas aprovadas por produto</li>
              <li>Cadastrar notificações dos produtos</li>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
