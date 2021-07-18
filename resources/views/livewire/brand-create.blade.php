<div>
  <div class="col-md-12">
    <br>
    <div class="card">
      <div class="card-header">
        <b>{{ $title }}</b>
      </div>

      <div class="card-body">
        <form wire:submit.prevent="create" method="post">
          <div class="form-inline">
            <label for="marca">Marca: </label>
            <input wire:model="marca" type="text" class="form-control">
            <label for="marca">Empresa: </label>
            <select wire:model.lazy="company_id" class="form-control">
                <option>Selecione uma empresa...</option>
              @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->empresa }}</option>
              @endforeach
            </select>
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
        <livewire:brand-show />
      </div>
    </div>
  </div>
</div>
