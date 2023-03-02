@include('admin.header')


<main class="container">
<h2 class="big-text">Barcha yangi tulovlar</h2>

<div class="statistik">
	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Payeer address</td>
				<td>Summ</td>
				<td>Number</td>
				<td>Status</td>
				<td>Tulangani</td>
			</tr>
		</thead>
			@forelse ($payments as $payment)
			<tbody>
				<tr>
					<th>{{ $payment->id}}</th>
					<th><a href="{{ route('admin.new.payment.show',$payment->id) }}">{{ $payment->name }}</a></th>
					<th>{{ $payment->payeer_adress }}</th>
					<th>{{ $payment->summ }}</th>
					<th>{{ $payment->number ?? "null" }}</th>
					<th>{{ $payment->status ? "Tulangan" : "Tulanmagan" }}</th>
					<th>{{ date_format( new DateTime($payment->created_at), "d F Y H:i" ) }}</th>
				</tr>
			</tbody>
            @empty
            <tbody>
                <tr><div style="color:red">New payment not found!</div></tr>
            </tbody>
			@endforelse
	</table>
{{ $payments->links() }}
</div>

</main>
@include('admin.footer')