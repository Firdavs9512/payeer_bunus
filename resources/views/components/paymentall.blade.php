<center>
    <table class="tbl">
    <thead><tr>
    <th scope="col">Имя пользователя</th>
    <th scope="col">Сумма</th>
    <th scope="col">Адрес</th>
    <th scope="col">Дата</th>
    </tr></thead>
    @forelse($payments as $payment)
    <tbody><tr>
    <td scope="row" aria-label="Имя пользователя"><a style="color: #000;">{{ $payment->name }}</a></td>
    <td aria-label="Сумма"><b>{{ $payment->summ }}</b> руб.</td>
    <td aria-label="Адрес"><b>{{ substr($payment->payeer_adress, 0, -3 ) }}***</b></td>
    <td aria-label="Дата">{{ date_format( new DateTime($payment->created_at), "d F Y H:i" ) }}</td>
    </tr></tbody>
    @empty
    <p>NO Payments</p>
    @endforelse
</table>
</center>
