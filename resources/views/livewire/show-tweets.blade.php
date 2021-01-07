<div>
    <form wire:submit.prevent="create" method="post" class="d-flex justify-content-between mt-2">
        <input type="text" name="message" id="message" wire:model="message" class="form-control">
        <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 2px;">Enviar</button>
    </form>

    <table class="table table-bordered mt-2">
        <tr>
            <th>Usuário</th>
            <th>Tweet</th>
        </tr>
        @foreach ($tweets as $tweet)
        <tr>
            <td>{{ $tweet->user->name }}</td>
            <td>{{ $tweet->content }}</td>
        </tr>
        @endforeach
    </table>
</div>
