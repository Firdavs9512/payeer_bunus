@include('header.header')


<div class="container" style="margin-top: 10px;flex-direction: row;justify-content: center;align-items: flex-start">
    <div class="main__ung">
        <div class="post__title">
            Ежедневные бонусы и сёрфинг
        </div>


        <div class="auth__container">

            <div class="auth__title">
                <img width="50" height="50" src="https://fast-bonus.ru/pic/login.png" alt="">
                <h3>АВТОРИЗАЦИЯ</h3>
            </div>
            <form method="post" action="{{ route('loginreq') }}">
                @csrf
            <div class="auth__row">
                <label for="email">Ваш email указанный при регистрации:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="auth__row">
                <label for="pass">Ваш пароль:</label>
                <input type="password" id="pass" name="password" required>
            </div>
            <div class="auth__row">
                <label for="">Подтвердите что Вы не бот:</label>
                <div><script src="https://www.google.com/recaptcha/api.js" 
                            async defer></script>
                    <div class="g-recaptcha" id="feedback-recaptcha" 
                         data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">
                    </div></div>
            </div>
            <input class="reg__button" type="submit" value="Войти">
            </form>
            <div class="auth__row">
                <a href="{{ route('reset_password') }}">Забыли пароль?</a>
                <div>
                    Нет аккаунта?
                    <a href="{{ route('reg') }}">Зарегистрироваться</a>
                </div>
            </div>
        </div>


    </div>
    <div class="main__chap">
        <x-nologin />

        <x-statistika son="20"></x-statistika>

        <?php $list = ['Received', 'In Process', 'Repaired', 'Completed', 'Shipped', 'Waiting on Boards', 'In Route'];?>
        <x-textreklama :rek="$list" />
        <x-banerreklama />
    </div>

</div>





@include('footer.footer')
