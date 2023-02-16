<footer>
    <div class="footer__container">
        <p><a href="{{ route('index') }}">{{ ($_SERVER['HTTP_HOST']) }} © 2023 Все права защищены</a></p>
        <div class="footer_nav">
            <a href="{{ route('contact') }}">Контакты</a><span> |</span>
            <a href="{{ route('rules') }}">Правила</a><span> |</span>
            <a href="https://t.me/whoami_teem">Купить скрипт</a>
        </div>
        <div class="footer_img">
            <img src="https://fast-bonus.ru/img/payeer.png" alt="">
        </div>
    </div>
</footer>


<!-- JavaScriopt codes -->
<!-- <script type="text/javascript" src="/assets/js/jquery-3.6.3.min.js"></script> -->
<script type="text/javascript" src="/assets/js/jquery.notifyBar.js"></script>
<!-- <script type="text/javascript" src="/assets/js/jquery.flipcountdown.js"></script> -->
<script type="text/javascript" src="/assets/js/main.js"></script>
<script type="text/javascript" src="/assets/js/bonus.js"></script>
<script type="text/javascript">
error = "{{ Session::get('error') }}";
if (error !==""){
    $.notifyBar({ cssClass: "error", html: error });
}

info = "{{ Session::get('info') }}";
if (info !==""){
    $.notifyBar({ cssClass: "info", html: info });
}
</script>


</body>
</html>
