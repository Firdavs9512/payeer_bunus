@include('header.header')


<div class="container" style="margin-top: 10px;flex-direction: row;justify-content: center;align-items: flex-start">
    <div class="main__ung">
        <div class="post__title">
            Ежедневные бонусы и сёрфинг
        </div>

        <div class="post__ads">
            <a target="_blank" href="https://www.neobux.com/?r=Nobody9512"><img src="https://www.neobux.com/imagens/banner5.gif" width="468" height="60"></a>
        </div>

        <div class="post__content">
            <x-texticon />

            <div class="post__ads">
                <a target="_blank" href="https://www.neobux.com/?r=Nobody9512"><img src="https://www.neobux.com/imagens/banner9.gif" width="468" height="60"></a>
            </div>

            <div class="post__content-main">
                <h2>Последние 50 начислений</h2>
                <div style="">
                    <div id="display_update_history_profit">
                        <x-payment50 :lists="$bonuses" />
                    </div>
                </div>
            </div>
            <div class="post__ads" style="margin-top: 15px">
                {!! $GLOBALS['qushimcha_image_baner'] !!}
            </div>
            <div class="post__ads" style="margin-top: 10px">
                {!! $GLOBALS['qushimcha_image_baner'] !!}
            </div>
            <div class="post__ads">
                {!! $GLOBALS['index_yozuvli_reklama'] !!}
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
