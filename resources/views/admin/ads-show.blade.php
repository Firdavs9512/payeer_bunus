@include('admin.header')


<main class="container">
<h2 class="big-text">Ads update</h2>

<div class="statistik">
    <form method="post" action="{{ route('admin.ads.update',$ads->id) }}">
    @csrf
	<div>
		<label>Name: </label>
		<input type="text" name="name" value="{{ $ads->name }}">
	</div>
	<div>
		<label>Url: </label>
		<input type="text" name="url" value="{{ $ads->url }}">
	</div>
	<div>
		<label>Location: </label>
		<input type="text" name="location" value="{{ $ads->location }}">
	</div>
    <div>
        <input type="submit" value="Save chages">
	</div>	
</form>	
</div>

</main>
@include('admin.footer')