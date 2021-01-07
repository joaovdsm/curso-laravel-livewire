<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Tweets') }}
    </h2>
</x-slot>

<div>
    <form wire:submit.prevent="create" method="post" class="d-flex justify-content-between mt-2">
        <input type="text" name="message" id="message" wire:model="message" placeholder="No que você esta pensando, {{ auth()->user()->name }}?" class="form-control">

        <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 2px;">Enviar</button>
    </form>

    @error('message')
        <div class="alert alert-danger mt-2 mb-0">
            {{ $message }}
        </div>
    @enderror

    <table class="table table-bordered mt-2">
        <tr>
            <th>Usuário</th>
            <th>Tweet</th>
            <th style="width: 100px">Ações</th>
        </tr>
        @foreach ($tweets as $tweet)
        <tr>
            <td>{{ $tweet->user->name }}</td>
            <td>{{ $tweet->content }}</td>
            <td class="d-flex">
                <a href="#" style="margin-right: 2px" class="btn btn-primary p-1 btn-sm">Editar</a>
                @if ($tweet->likes->count())
                    <a href="#" wire:click.prevent="unlike({{ $tweet->id }})" class="btn btn-danger btn-sm p-1">Descurtir</a>
                @else
                    <a href="#" wire:click.prevent="like({{ $tweet->id }})" class="btn btn-success btn-sm p-1">Curtir</a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>

    <div class="fixed-bottom container mb-2">
        {{ $tweets->links() }}
    </div>
</div>
