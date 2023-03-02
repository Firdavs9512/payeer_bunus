@include('admin.header')


<main class="container">
<h2 class="big-text">User:</h2>

<div class="statistik">
    <form method="post" action="{{ route('admin.user.update',$user->id) }}">
    @csrf
	<div>
		<label>Name: </label>
		<input type="text" name="name" value="{{ $user->name }}">
	</div>
	<div>
		<label>Email: </label>
		<input type="text" name="email" value="{{ $user->email }}">
	</div>
	<div>
		<label>Password: </label>
		<input type="text" name="password" value="{{ $user->password }}">
	</div>
    <div>
		<label>Balance: </label>
		<input type="text" name="balanse" value="{{ $user->balanse }}">
	</div>
    <div>
		<label>Money: </label>
		<input type="text" name="money" value="{{ $user->money }}">
	</div>
    <div>
		<label>Payeer: </label>
		<input type="text" name="payeer" value="{{ $user->payeer }}">
	</div>
    <div>
		<label>Refer: </label>
		<input type="text" name="refer" value="{{ $user->refer }}">
	</div>
    <div>
		<label>IP: </label>
		<input type="text" name="ip" value="{{ $user->ip }}">
	</div>
    <div>
		<label>Active: </label>
		<input type="checkbox" id="active" name="active" value="1" {{ $user->active ? 'checked="checked"' : '' }}>
	</div>
    <div>
        <input type="submit" value="Save chages">
	</div>	
</form>	
</div>

</main>
@include('admin.footer')