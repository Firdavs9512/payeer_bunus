@include('header.header')


<div class="container" style="margin-top: 10px;flex-direction: row;justify-content: center;align-items: flex-start">
    <div class="main__ung">
        <div class="post__title">
            Ежедневные бонусы и сёрфинг
        </div>


        <div class="auth__container">

            <div class="auth__title">
                <img width="50" height="50" src="https://fast-bonus.ru/pic/register.png" alt="">
                <h3>РЕГИСТРАЦИЯ</h3>
            </div>
            <form action="{{ route('registerreq') }}" method="post">
                @csrf
            <div class="auth__row">
                <label for="name">Ваше имя:</label>
                <div style="display: grid;">
                    <input type="text" id="name" name="name" required>
                    @if($errors->has('name'))
                        <span style="font-size:14px;color:red">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="auth__row">
                <label for="email">Ваш email:</label>
                <div style="display: grid;">
                    <input type="email" id="email" name="email" required>
                    @if($errors->has('email'))
                        <span style="font-size:14px;color:red">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                
            </div>
            <div class="auth__row">
                <label for="pass">Пароль:</label>
                <div style="display: grid;">
                    <input type="password" id="pass" name="password" required>
                    @if($errors->has('password'))
                        <span style="font-size:14px;color:red">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="auth__row">
                <label for="pass_r">Пароль ещё раз:</label>
                <div style="display: grid;">
                    <input type="password" id="pass_r" name="password_confirmation" required>
                    @if($errors->has('password_confirmation'))
                        <span style="font-size:14px;color:red">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
            </div>
            <div class="auth__row">
                <label for="ref">Вас пригласил(а):</label>
                <input style="opacity: 35%" type="text" id="ref" name="refer" value="{{ session('refer') ?? 'Вы сами пришли' }}"readonly >
            </div>
            <div class="auth__row">
                <label for="">Подтвердите что Вы не бот:</label>
                <div>capcha</div>
            </div>
            <div class="auth__row">
                <label>Ознакомьтесь с правилами:</label>
                <div>
                    <input type="checkbox" id="confirm" required >
                    <label for="confirm">
                        С правилами сайта ознакомлен(а) и<br> принимаю их в полном объеме.
                    </label><br>

                </div>
            </div>
            <input class="reg__button" type="submit" value="Зарегистрироваться">
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
