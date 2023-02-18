@include('admin.header')


<main class="container">
<h2 class="big-text">Settings</h2>

<div class="statistik">
	<input type="hidden" id="token" data-token="{{ csrf_token() }}">
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
</div>

</main>
@include('admin.footer')