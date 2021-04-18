<div>
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
              <th scope="col">Código</th>
              <th scope="col">Descrição Resumida</th>
              <th scope="col">Descrição Completa</th>
              <th scope="col">Apresentação</th>
              <th scope="col">XYZ</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr>
                <td>{{ $product->codigo }}</td>
                <td>{{ $product->resumida }}</td>
                <td>{{ $product->descricao }}</td>
                <td>{{ $product->apresentacao }}</td>
                <td>{{ $product->classification }}</td>
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
