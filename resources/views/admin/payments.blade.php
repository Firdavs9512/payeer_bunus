@include('admin.header')


<main class="container">
<h2 class="big-text">Barcha tulab berilgan pullar</h2>

<div class="statistik">
	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Payeer address</td>
				<td>Summ</td>
				<td>Number</td>
				<td>User id</td>
				<td>Tulangani</td>
			</tr>
		</thead>
			@foreach ($payments as $payment)
			<tbody>
				<tr>
					<th>{{ $payment->id}}</th>
					<th>{{ $payment->name }}</th>
					<th>{{ $payment->payeer_adress }}</th>
					<th>{{ $payment->summ }}</th>
					<th>{{ $payment->number }}</th>
					<th>{{ $payment->user_id }}</th>
					<th>{{ date_format( new DateTime($payment->created_at), "d F Y H:i" ) }}</th>
				</tr>
			</tbody>
			@endforeach
	</table>
{{ $payments->links() }}
</div>

</main>
@include('admin.footer')