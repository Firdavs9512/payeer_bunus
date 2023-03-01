@include('admin.header')


<main class="container">
<h2 class="big-text">Statistika</h2>

<div class="statistik">
	<div>Barcha foydalanuchilar: <span>{{ $data['users'] }} ta</span></div>
	<div>Barcha pul yechishlar: <span>{{ $data['payments'] }} ta</span></div>
	<div>Barcha bonuslar soni: <span>{{ $data['bonuses'] }} ta</span></div>
	<div>Barcha Yangi foydalanuvchilar: <span>{{ $data['newusers'] }} ta</span></div>
    <div>Web site nomi: <span>{{ $data['sitename'] }}</span></div>
	<div>Tolov tizimi holati: <span>{{ $data['payment_action']==1 ? 'Ochiq' : 'Yopiq' }}</span></div>
	<div>Payeer address: <span>{{ $data['payeer_address'] }}</span></div>
	<div>Payeer id: <span>{{ $data['payeer_id'] }}</span></div>
	<div>Payeer sicret: <span>{{ ($data['payeer_sicret']!='') ? $data['payeer_sicret'] : 'null' }}</span></div>
</div>

</main>
@include('admin.footer')