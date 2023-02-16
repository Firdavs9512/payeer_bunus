@include('header.header')


<div class="container" style="margin-top: 10px;flex-direction: row;justify-content: center;align-items: flex-start">
    <div class="main__ung">
        <div class="post__title">
            Ежедневные бонусы и сёрфинг
        </div>

        <x-postads />

        <div class="post__content">

            <div class="post__content-main">
                <h2>Контакты</h2>
                <p>
                    Для решения технических, финансовых и прочих вопросов, пожалуйста, обращайтесь по ниже перечисленным реквизитам.
                </p>
                <b>Email: <a href="mail:freeservices.uz@gmail.com">freeservices.uz@gmail.com</a></b><br>

                <b>Telegram: <a href="https://t.me/whoami_teem">https://t.me/whoami_teem</a></b>
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
