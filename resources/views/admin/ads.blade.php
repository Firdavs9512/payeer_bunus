@include('admin.header')


<main class="container">
<h2 class="big-text">Settings</h2>

<div class="statistik">
	<form action="{{ route('admin.ads.create') }}" method="post">
		@csrf
		<div>
			<label>Name: </label>
			<input type="text" name="name" required>
		</div>
		<div>
			<label>Url: </label>
			<textarea style="padding: 5px" name="url" id="" cols="22" rows="2"></textarea>
		</div>
		<div>
			<label>Location: </label>
			<input type="text" name="location" required>
		</div>
		<input class="btn" type="submit" value="Create ads">
	</form>
	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Url</td>
				<td>Location</td>
				<td>Yaratilgani</td>
				<td>Action</td>
			</tr>
		</thead>
			@foreach ($ads as $ad)
			<tbody>
				<tr>
					<th>{{ $ad->id }}</th>
					<th>{{ $ad->name }}</th>
					<th>{{ $ad->url }}</th>
					<th>{{ $ad->location }}</th>
					<th>{{ date_format( new DateTime($ad->created_at), "d F Y H:i" ) }}</th>
					<th> <a style="color: red" href="">Delete</a> </th>
				</tr>
			</tbody>
			@endforeach
	</table>		
</div>

</main>
@include('admin.footer')