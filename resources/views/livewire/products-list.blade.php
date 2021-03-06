<div>
  <br>
  <div class="col-md-12">
    <div class="card text-left">
      <div class="card-header">
        <b>{{ $title }} - {{ Route::current()->categoria }}</b>
      </div>
      <div class="card-body">
        <p class="text-right">
          <a class="btn btn-success" href="{{ route('produto.create') }}" role="button"> <i class="bi bi-plus-circle"></i> Cadastrar</a>
        </p>
          <input wire:model="search" class="form-control mr-sm-4" type="text" name="search" placeholder="Digite aqui para pesquisar" aria-label="Pesquisar">
          
         {{--  <button wire:click.prevent="pesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="bi bi-search"></i>
            Pesquisar</button> --}}
            <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              {{-- <thscope="col">Categoria</th> --}}
              <th scope="col">Código</th>
              <th scope="col">Descrição Resumida</th>
              <th scope="col">Descrição Completa</th>
              <th scope="col">Apresentação</th>
              <th scope="col">Imagem</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
                <tr>
                  {{-- <td>$product->categoria }}</td>--}}
                  <td>{{ $product->codigo }}</td>
                  <td>{{ $product->resumida }}</td>
                  <td>{{ $product->descricao }}</td>
                  <td>{{ $product->apresentacao }}</td>
                  <td>
                    @if ($product->img_photo_path)
                      <a href="{{ url("storage/{$product->img_photo_path}") }}">
                        <img src="{{ url("storage/{$product->img_photo_path}") }}?{{ rand() }}" width="500" height="500"
                          class="img-thumbnail img-responsive" alt="...">
                      </a>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('produto.show', $product->id) }}">
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
</div>
