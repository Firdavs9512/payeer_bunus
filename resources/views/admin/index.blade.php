@include('admin.header')


<main class="container">
<h2 class="big-text">Statistika</h2>

<div class="statistik">
	<div>Barcha foydalanuchilar: <span>{{ $data['users'] }} ta</span></div>
	<div>Barcha pul yechishlar: <span>{{ $data['payments'] }} ta</span></div>
	<div>Barcha bonuslar soni: <span>{{ $data['bonuses'] }} ta</span></div>
	<div>Barcha Yangi foydalanuvchilar: <span>{{ $data['newusers'] }} ta</span></div>
</div>

</main>
@include('admin.footer')