<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel - Раздача Payeer бонусов</title>
    <!-- <link rel="stylesheet" href="/resources/css/app.css"> -->
    <link rel="stylesheet" href="/assets/css/jquery.notifyBar.css">
    <!-- <link rel="stylesheet" href="/assets/css/jquery.flipcountdown.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.css">
   <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>


<header>
   <div class="container">
   	<nav>
   		<a class="btn" href="{{ route('admin') }}">Index</a>
   		<a class="btn" href="{{ route('admin.settings') }}">Setting</a>
   		<a class="btn" href="{{ route('admin.users') }}">Users</a>
   		<a class="btn" href="{{ route('admin.payment') }}">Paymetns</a>
   		<a class="btn" href="{{ route('admin.new.payment') }}">New payments</a>
   		<a class="btn" href="{{ route('admin.ads') }}">Ads</a>
   		<a class="btn" href="{{ route('admin.logout') }}">Logout</a>
   	</nav>
   </div>
</header>


