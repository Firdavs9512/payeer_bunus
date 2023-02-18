@include('admin.header')


<main class="container">
<h2 class="big-text">Create new user</h2>

<div class="statistik">
    <form action="{{ route('admin.newuser') }}" method="post">
        @csrf
	<div>
		<label>Name: </label>
		<input type="text" name="name" required placeholder="name">
		@error('name')
		<p style="color: red">{{ $message }}</p>
		@enderror
	</div>
	<div>
		<label>Email: </label>
		<input type="email" name="email" required placeholder="example@example.com">
		@error('email')
		<p style="color: red">{{ $message }}</p>
		@enderror
	</div>
	<div>
		<label>Password: </label>
		<input type="text" name="password" required placeholder="password">
		@error('password')
		<p style="color: red">{{ $message }}</p>
		@enderror
	</div>	
    <div>
		<label>Payeer: </label>
		<input type="text" name="payeer" placeholder="P100000">
	</div>
    <div>
		<label>Balanse: </label>
		<input type="text" name="balanse" required placeholder="12.5">
	</div>	
    <div>
		<label>IP: </label>
		<input type="text" name="ip" required placeholder="127.0.0.1">
		@error('ip')
		<p style="color: red">{{ $message }}</p>
		@enderror
	</div>	
    <div>
		<label>Refer: </label>
		<input type="text" name="refer" required placeholder="1">
	</div>
    <input class="btn" type="submit" value="Create user">
    </form>
</div>

</main>
@include('admin.footer')