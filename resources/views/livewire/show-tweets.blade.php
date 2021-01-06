<div>
    Hello World <br>

    {{ $message }} <br>

    <input type="text" name="message" id="message" wire:model="message">

    <table border="1">
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
