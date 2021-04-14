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
                        <label for="categoria">Categoria: </label>
                        <input wire:model="categoria" type="text" class="form-control" >
                        <button type="submit" class="btn btn-success">Cadastrar</button> 
                    </div>
                    <br>
                    @if ($errors->any())
                        <ul>
                            <div class="alert alert-danger col-md-3" role="alert">
                                @error('categoria')
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
                <livewire:categories-show />
            </div>
        </div>
    </div>
</div>