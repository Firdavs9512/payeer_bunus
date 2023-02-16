@include('admin.header')


<main class="container">
<h2 class="big-text">Barcha foydalanuvchilar</h2>

<div class="statistik">
	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Email</td>
				<td>Password</td>
				<td>Balanse and money</td>
				<td>Yaratilgani</td>
				<td>Action</td>
			</tr>
		</thead>
			@foreach ($users as $user)
			<tbody>
				<tr>
					<th>{{ $user->id}}</th>
					<th>{{ $user->name }}</th>
					<th>{{ $user->email }}</th>
					<th>{{ $user->password }}</th>
					<th>{{ $user->balanse }}rub and {{ $user->money }}rub</th>
					<th>{{ date_format( new DateTime($user->created_at), "d F Y H:i" ) }}</th>
					<th> <a href="#">Active</a> </th>
				</tr>
			</tbody>
			@endforeach
	</table>
{{ $users->links() }}
</div>

</main>
@include('admin.footer')