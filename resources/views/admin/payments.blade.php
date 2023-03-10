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
				<td>Tulangani</td>
			</tr>
		</thead>
			@foreach ($payments as $payment)
			<tbody>
				<tr>
					<th><a href="{{ route('admin.new.payment.show',$payment->id) }}">{{ $payment->id}}#</a></th>
					<th><a href="{{ route('admin.user.show',$payment->user_id) }}">{{ $payment->name }}</a></th>
					<th>{{ $payment->payeer_adress }}</th>
					<th>{{ $payment->summ }}</th>
					<th>{{ $payment->number }}</th>
					<th>{{ date_format( new DateTime($payment->created_at), "d F Y H:i" ) }}</th>
				</tr>
			</tbody>
			@endforeach
	</table>
{{ $payments->links() }}
</div>

</main>
@include('admin.footer')