@include('admin.header')


<main class="container">
<h2 class="big-text">Payment action</h2>

<div class="statistik">
    <form method="post" action="{{ route('admin.new.payment.update', $payment->id) }}">
    @csrf
	<div>
		<label>User name: </label>
        <a href="{{ route('admin.user.show', $payment->user_id) }}">{{ $payment->name }}</a>
		{{-- <input type="text" disabled value="{{ $payment->name }}"> --}}
	</div>
	<div>
		<label>Payeer: </label>
		<input type="text" disabled value="{{ $payment->payeer_adress }}">
	</div>
    <div>
		<label>Summa: </label>
		<input type="text" disabled value="{{ $payment->summ }}">
	</div>
    <div>
		<label>History number: </label>
		<input type="number" name="number" value="{{ $payment->number }}">
	</div>
    <div>
		<label>Payment action: </label>
		<select name="payment_action" id="select">
			<option value="tulangan" {{ $payment->status ? 'Selected' : '' }}>Tulangan</option>
			<option value="tulanmagan" {{ $payment->status == 0 ? 'Selected' : '' }}>Tulanmagan</option>
		</select>
	</div>
    <div>
        <input type="submit" value="Save chages">
	</div>	
</form>	
</div>

</main>
@include('admin.footer')