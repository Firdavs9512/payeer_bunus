@include('header.header')


<div class="container" style="margin-top: 10px;flex-direction: row;justify-content: center;align-items: flex-start">
    <div class="main__ung">
        <div class="post__title">
            Ежедневные бонусы и сёрфинг
        </div>

        <x-postads />

        <div class="post__content">

            <div class="post__content-main">
                <h2>ТОП 30 пользователей по заработку</h2>
                <div style="">
                    <div id="display_update_history_profit_c">
                        <x-top30 :tops="$tops"/>
                    </div>
                </div>
            </div>
            <div class="post__ads" style="margin-top: 15px">
                <img src="https://bannerswall.ru/promo/dummy/468x60.png" width="468" height="60">
            </div>
            <div class="post__ads" style="margin-top: 10px">
                <img src="https://bannerswall.ru/promo/dummy/468x60.png" width="468" height="60">
            </div>
            <div class="post__ads">
                <a href="#">Реклама от CashClix.ru</a>
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



@include('footer.footer')
