<center>
    <table class="tbl">
    <thead><tr>
    <th scope="col">Пользователь ид</th>
    <th scope="col">Сумма</th>
    <th scope="col">Число</th>
    <th scope="col">Дата</th>
    </tr></thead>
    @forelse($payments as $payment)
    <tbody><tr>
    <td scope="row" aria-label="Пользователь ид"><a style="color: #000;">{{ $payment->user_id }}</a></td>
    <td aria-label="Сумма"><b>{{ $payment->summ }}</b> руб.</td>
    <td aria-label="Число"><b>{{ $payment->number }}</b></td>
    <td aria-label="Дата">{{ date_format( new DateTime($payment->created_at), "d F Y H:i" ) }}</td>
    </tr></tbody>
    @empty
    <p>NO Payments</p>
    @endforelse
</table>
</center>
