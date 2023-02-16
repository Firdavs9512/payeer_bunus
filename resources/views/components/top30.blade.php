<table style="margin-top: 10px; text-align: center; border: 0" width="100%" class="tbl" cellpadding="5" cellspacing="0">
    <thead><tr>
    <th scope="col">№</th>
    <th scope="col">Пользователь</th>
    <th scope="col">Заработал</th>
    </tr></thead>
    @forelse ($tops as $top)
    <tbody><tr>
    <td scope="row" aria-label="№">{{ $loop->index +1 }}</td>
    <td aria-label="Пользователь"><a style="color: #000;">{{ $top->name }}</a></td>
    <td aria-label="Заработал">{{ $top->money }} руб.</td>
    </tr></tbody>
    @empty
    <td>No TOP users</td>
    @endforelse
</table>
