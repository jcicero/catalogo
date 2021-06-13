<div>
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
</div>