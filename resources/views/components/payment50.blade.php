<center>
    <table class="tbl">
    <thead><tr>
    <th scope="col">Пользователь ид</th>
    <th scope="col">Сумма</th>
    <th scope="col">Число</th>
    <th scope="col">Дата</th>
    </tr></thead>
    @forelse($lists as $list)
    <tbody><tr>
    <td scope="row" aria-label="Пользователь ид"><a style="color: #000;">{{ $list->user_id }}</a></td>
    <td aria-label="Сумма"><b>{{ $list->bonus }}</b> руб.</td>
    <td aria-label="Число"><b>{{ $list->bonus_number }}</b></td>
    <td aria-label="Дата">{{ date_format( new DateTime($list->created_at), "d F Y H:i" ) }}</td>
    </tr></tbody>
    @empty
    <p>NO Payments</p>
    @endforelse
</table>
</center>
