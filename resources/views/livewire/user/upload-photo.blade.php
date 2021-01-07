<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Alterar imagem') }}
    </h2>
</x-slot>

<div class="container">

    <form class="d-flex" action="#" method="post" wire:submit.prevent="storagePhoto">

        <input class="form-control" type="file" wire:model="photo">
        <button style="margin-left: 2px" class="btn btn-success" type="submit">Alterar</button>

    </form>

    @error('photo')
        <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
        </div>
    @enderror

</div>
