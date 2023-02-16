@include('header.header')


<div class="container" style="margin-top: 10px;flex-direction: row;justify-content: center;align-items: flex-start">
    <div class="main__ung">
        <div class="post__title">
            Ежедневные бонусы и сёрфинг
        </div>


        <div class="auth__container">

            <div class="auth__title">
                <img width="50" height="50" src="https://fast-bonus.ru/pic/info.png" alt="">
                <h3>НАПОМНИТЬ ПАРОЛЬ</h3>
            </div>
            <form action="{{ route('resetreq') }}" method="post">
            @csrf
            <div class="auth__row">
                <label for="email">Ваш email указанный при регистрации:</label>
                <div style="display: grid;">
                    <input type="email" id="email" name="email" required>
                    @if($errors->has('email'))
                        <span style="font-size:14px;color:red">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <input class="reg__button" type="submit" value="Получить новый пароль">
            </form>
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
