
<form>
    <input type="hidden" wire:model="post_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Titulo:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Titulo" wire:model="titulo">
        @error('titulo') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Corpo:</label>
        <textarea type="text" class="form-control" id="exampleFormControlInput2" wire:model="body" placeholder="Corpo"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancelar()" class="btn btn-danger">Cancel</button>
</form>