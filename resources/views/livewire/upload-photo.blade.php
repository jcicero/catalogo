<div>

  <img src="{{ url("storage/{$product->photo}") }}?{{ rand() }}" width="500" height="500" class="img-thumbnail img-responsive" alt="...">

    <form wire:submit.prevent="save" method="post">

        {{--<input type="file" class="form-control-file" wire:model="photo">--}}
<div class="form-group">
 <div class="controls form-inline">
    <input type="file" class="form-control" id="customFile" wire:model="photo"/>
    <button class="btn btn-primary" type="submit">Salvar</button>
        @error('photo') <span class="error">{{ $message }}</span> @enderror
    </form>
</div>
</div>

</div>
