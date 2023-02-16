@include('header.header')


<div class="container" style="margin-top: 10px;flex-direction: row;justify-content: center;align-items: flex-start">
    <div class="main__ung">
        <div class="post__title">
            Ежедневные бонусы и сёрфинг
        </div>


        <div class="auth__container">

            <div class="auth__title">
                <h3>Личные данные</h3>
            </div>
            
            <div class="auth__row">
                <label for="">E-mail</label>
                <div>{{ auth()->user()->email }}</div>
            </div>
            <div class="auth__row">
                <label for="">Логин</label>
                <div>{{ auth()->user()->name }}</div>
            </div>

            @if(auth()->user()->payeer == "")
            <form method="post" action="{{ route('update-payeer') }}">
                @csrf
            <div class="auth__row">
                <label for="payeer">Payeer кошелек</label>
                <input style="width: 300px;" type="text" id="payeer" name="payeer" placeholder="Правильно вводите свой кошелек. Изменить будет невозможно!" required>
            </div>
            <div class="auth__row">
                <label for="password">Пароль</label>
                <input style="width:300px" type="password" id="password" name="password" placeholder="Пароль">
            </div>
            <input class="reg__button" type="submit" value="Изменить личную информацию">
            </form>

            @else
            <div class="auth__row">
                <label for="payeer">Payeer кошелек</label>
                <input style="width: 300px;opacity: 35%;overflow: hidden;" type="text" value="{{ auth()->user()->payeer }}" id="payeer" readonly>
            </div>
            @endif

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
