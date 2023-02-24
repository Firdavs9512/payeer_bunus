<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payeer bonus - Раздача Payeer бонусов</title>
    <!-- <link rel="stylesheet" href="/resources/css/app.css"> -->
    <link rel="stylesheet" href="/assets/css/jquery.notifyBar.css">
    <!-- <link rel="stylesheet" href="/assets/css/jquery.flipcountdown.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.google.com/recaptcha/enterprise.js?render={{ env('GOOGLE_RECAPTCHA_KEY') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.css">
  <script type='text/javascript' src='//pl18519449.highcpmrevenuenetwork.com/94/d7/d8/94d7d804e7ae81a68e08e827aebef947.js'></script>
  {{ $GLOBALS['HEADER'] }}
    @vite('resources/css/app.css')
</head>

<script type="text/javascript">
    const navbar = document.getElementById('a_reklama');
    fetch('/api/ads/reklama/yuqori1').then(
        function(response){
            return response.json();
        }).then(function(data){
            // console.log(data);
            var reklama1 = '';
            var reklama2 = '';
            data.yuqori1.forEach((rek)=> {
                // console.log(rek);
                reklama1 += rek.url;
            })
            data.yuqori2.forEach((rek1)=> {
                // console.log(rek);
                reklama2 += rek1.url;
            })
            document.getElementById("a_reklama1").innerHTML = reklama1;
            document.getElementById("a_reklama2").innerHTML = reklama2;
            // console.log(reklama1);
        })
</script>

<body>


<header>
    <div class="container">
        <div class="nav__header">
            <div class="nav__chap">
                <a class="button" href="{{ route('index') }}">Главная</a>
                <a class="button" href="#">МультиСёрф</a>
                <a class="button" href="{{ route('payments') }}">Выплаты</a>
                <a class="button" href="{{ route('top') }}">ТОП</a>
            </div>
            <div class="nav__ung">PayeerBonus</div>
        </div>

        <div id="a_reklama1" class="nav__pas">
            <!-- <a href="#">30руб!! Каждые 10 минут!!</a>
            <a href="#">30руб!! Каждые 10 минут!!</a>
            <a href="#">30руб!! Каждые 10 минут!!</a>
            <a href="#">30руб!! Каждые 10 минут!!</a>
            <a href="#">30руб!! Каждые 10 минут!!</a> -->
        </div>
        <div id="a_reklama2" class="nav__pas" style="margin-bottom: 15px">
            <!-- <a href="#">30руб!! Каждые 10 минут!!</a>
            <a href="#">30руб!! Каждые 10 минут!!</a>
            <a href="#">30руб!! Каждые 10 минут!!</a>
            <a href="#">30руб!! Каждые 10 минут!!</a>
            <a href="#">30руб!! Каждые 10 минут!!</a> -->
        </div>
    </div>
</header>



