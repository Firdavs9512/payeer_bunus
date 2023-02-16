<div class="post__title">
    <div class="post__title">
        Пользовательский раздел
    </div>
    <div class="auth__menu">
        <p>ДОБРО ПОЖАЛОВАТЬ</p>
        <b><span>{{ auth()->user()->name }},</span> ID: {{ auth()->user()->id }}</b>
        <a class="user__balans">Баланс: {{ auth()->user()->balanse }} руб.</a>
        <a class="user__menu" href="{{ route('balance') }}">Вывод средств</a>
        <a class="user__menu" href="{{ route('bonus') }}">Получить бонус</a>
        <a class="user__menu" href="{{ route('refs') }}">Мои рефералы</a>
        <a class="user__menu" href="{{ route('profile') }}">Личные данные</a>
        <a class="user__menu" href="/logout">Выход</a>
    </div>
</div>
