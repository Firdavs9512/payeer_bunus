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
            <form action="{{ route('forgotreq') }}" method="post">
                @csrf
            <input type="hidden" name="email" value="{{ $data['email'] }}">
            <input type="hidden" name="token" value="{{ $data['token'] }}">
            <div class="auth__row">
                <label for="password">Новый пароль:</label>
                <div style="display: grid;">
                    <input type="password" id="password" name="password" required>
                    @if($errors->has('password'))
                        <span style="font-size:14px;color:red">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="auth__row">
                <label for="password_confirmation">Новый пароль еще раз:</label>
                <div style="display: grid;">
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                    @if($errors->has('password_confirmation'))
                        <span style="font-size:14px;color:red">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
            </div>
            <input class="reg__button" type="submit" value="Save">
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
