@include('admin.header')


<main class="container">
<h2 class="big-text">Barcha foydalanuvchilar</h2>
<div style="display: flex;flex-direction: row; justify-content: space-between">
	<a style="margin-left: 50px;margin-bottom:20px" class="btn" href="{{ route('admin.create.user') }}">Create new user</a>
	<form action="" method="get">
		<input type="text" name="search" placeholder="Search"><button class="btn" type="submit">Search</button>
	</form>
</div>
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
					<th> <a href="{{ route('admin.users') }}/{{ $user->id }}">Active</a> </th>
				</tr>
			</tbody>
			@endforeach
	</table>
{{ $users->links() }}
</div>

</main>
@include('admin.footer')