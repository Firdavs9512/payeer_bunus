@include('admin.header')


<main class="container">
<h2 class="big-text">Settings</h2>

<div class="statistik">
	<input type="hidden" id="token" data-token="{{ csrf_token() }}">
	<div>
		<label>Site name: </label>
		<input type="text" value="{{ $data['sitename'] }}" id="site_name"><input onclick="$().updatedata('site_name')" type="button" value="Change" >
	</div>
	<div>
		<label>Day work: </label>
		<input type="text" id="work_day"><input onclick="$().updatedata('work_day')" type="button" value="Change">
	</div>
	<div>
		<label>New users: </label>
		<input type="text" id="new_users"><input onclick="$().updatedata('new_users')" type="button" value="Change">
	</div>
	<div>
		<label>Day payments: </label>
		<input type="text" id="day_payments"><input onclick="$().updatedata('day_payments')" type="button" value="Change">
	</div>	
	<div>
		<label>Header change: </label>
		<input value="{{ $data['header'] }}" type="text" id="header_change"><input onclick="$().updatedata('header_change')" type="button" value="Change">
	</div>
	<div>
		<label>Tolov tizimi holati: </label>
		<select name="payment_action" id="select">
			<option value="ochiq" {{ $data['payment_type'] == 1 ? 'Selected' : '' }}>Ochiq</option>
			<option value="yopiq" {{ $data['payment_type'] == 0 ? 'Selected' : '' }}>Yopiq</option>
		</select><input onclick="$().updatedata('payment_action')" type="button" value="Change">
	</div>
	<div>
		<label>Payeer address: </label>
		<input value="{{ $data['payeer_address'] }}" type="text" id="payeer_address"><input onclick="$().updatedata('payeer_address')" type="button" value="Change">
	</div>
	<div>
		<label>Payeer id: </label>
		<input value="{{ $data['payeer_id'] }}" type="text" id="payeer_id"><input onclick="$().updatedata('payeer_id')" type="button" value="Change">
	</div>
	<div>
		<label>Payeer sicret: </label>
		<input value="{{ ($data['payeer_sicret']!='') ? $data['payeer_sicret'] : 'null' }}" type="text" id="payeer_sicret"><input onclick="$().updatedata('payeer_sicret')" type="button" value="Change">
	</div>
</div>

</main>
@include('admin.footer')