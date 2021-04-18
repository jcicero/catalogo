<div>

    @if ($product->photo)
        <img src="{{ url("storage/{$product->photo}") }}?{{ rand() }}" width="500" height="500" class="img-thumbnail img-responsive" alt="...">    
    @endif

    <form wire:submit.prevent="save" method="post">
        {{--<input type="file" class="form-control-file" wire:model="photo">--}}
        <div class="form-group">
            <div class="controls form-inline">
                <input type="file" class="form-control" id="customFile" wire:model="photo"/>
                <button class="btn btn-primary form-control" type="submit"><i class="bi bi-image"></i> Salvar</button>
            </div>
        </div>
    </form>

                    @if ($errors->any())
                        <ul>
                            <div class="alert alert-danger col-md-3" role="alert">
                                @error('photo')
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

</div>
