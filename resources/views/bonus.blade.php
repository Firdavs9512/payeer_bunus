@include('header.header')


<div class="container" style="margin-top: 10px;flex-direction: row;justify-content: center;align-items: flex-start">
    <div class="main__ung">
        <div class="post__title">
            Ежедневные бонусы и сёрфинг
        </div>

        <x-postads />

        <div class="post__content">

            <div class="post__content-main">
                <h2>Раздача Payeer бонусов</h2>
                <p>
                    Для поощрения за посещения сайта, мы раздаем денежные бонусы, всем желающим пользователям данного ресурса. Бонусы раздаются круглосуточно - их можно получать каждые 30 минут! Накопленные на балансе рубли, можно выводить на свой Payeer кошелёк. Минимальная сумма для вывода: минимум 1 рубль.
                </p>
                <div style="display:flex;justify-content:center;padding:7px"><a style="padding-right:3px;font-weight:600" title="получить персональную ссылку для приглашения рефералов" href="/refs">Приглашайте рефералов </a> и получайте до 30% от их заработка! </div>

                @if(!$data['active'])
                <div style="display:flex;text-align:center;flex-direction:column;padding-bottom:5px">
                    <span style="color: #c35353;font-weight: bold">Для получения бонуса, нажмите на баннер ниже и подожди 10 сек.</span>
                    Рекламный сайт будет открыт в новой вкладке.
                </div>
                <div id="number_b" class="post__ads">
                    <a id="bonus-ads">
                        <img src="https://linkslot.ru/promo/dummy/468x60.jpg" width="468" height="60" style="border:0;margin:0;padding:0;">
                    </a>
                </div>
                <div id="number_a" style="display:flex;flex-direction:row;justify-content: center">
                    Время ожидания после клика по баннеру: <div id="sec"> 0</div> сек. из 10
                </div>
                @endif


                @if($data['active'])
                <div class="clock__style">
                    <div class="clock"></div> 
                </div>
                @endif

                @if(!$data['active'])
                <div id="activebonus" class="active__bonus" style=" ">
                    <table style="width:300px;">
                    <thead>
                        <tr>
                        <th>Название</th>
                        <th>Число</th>
                        <th>Сумма</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Noob</td>
                            <td>1-980</td>
                            <td>0.05 руб</td>
                        </tr>
                        <tr>
                            <td>Player</td>
                            <td>981-995</td>
                            <td>0.30 руб</td>
                        </tr>
                        <tr>
                            <td>Master</td>
                            <td>995-999</td>
                            <td>0.50 руб</td>
                        </tr>
                        <tr>
                            <td>Businessman</td>
                            <td>1000</td>
                            <td>1.00 руб</td>
                        </tr>
                    </tbody>
                        </table>
                    <form method="post" action="{{ route('getbonus') }}">
                    @csrf
                    <div style="width:100%;display: grid; justify-content: center;">
                        <div>
                            <script src="https://www.google.com/recaptcha/api.js" 
                            async defer></script>
                    <div class="g-recaptcha" id="feedback-recaptcha" 
                         data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">
                    </div>
                        </div>
                        <input class="reg__button" type="submit" name="send" value="Получить" title="получить">
                    </div>
                    </form>

                </div>  
                @endif                  

                
                <div style="display:flex;flex-direction:row;justify-content: center;padding:5px 0;font-weight: bold">
                    <a class="animation__text" href="#">⇑ Чтобы получить бонус, нажмите на баннер выше ⇑</a>
                </div>
                <x-postads />
                <h2>Последние 50 начислений</h2>
                <div id="display_update_history_profit">
                    <x-payment50 :lists="$bonuses" />
                </div>
            </div>
        </div>


    </div>
    <div class="main__chap">
        @auth
        <x-authlogin />
        @endauth

        @guest
        <x-nologin />
        @endguest

        <x-statistika son="20"></x-statistika>

        <?php $list = ['Received', 'In Process', 'Repaired', 'Completed', 'Shipped', 'Waiting on Boards', 'In Route'];?>
        <x-textreklama :rek="$list" />
        <x-banerreklama />
    </div>

</div>

@if($data['time'])
<script>
  $(document).ready(function() {
    var clock = $('.clock').FlipClock({{ $data['time'] }}, {
      clockFace: 'MinuteCounter',
      countdown: true,
      showSeconds: true,
      showMinutes: false,
      callbacks: {
        stop: function() {
          alert('Countdown complete!');
          location.reload();
        }
      }
    });
  });
</script>
@endif


@include('footer.footer')
