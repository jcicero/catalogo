<div>
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