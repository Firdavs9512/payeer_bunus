<!-- JavaScriopt codes -->
<!-- <script type="text/javascript" src="/assets/js/jquery-3.6.3.min.js"></script> -->
<script type="text/javascript" src="/assets/js/jquery.notifyBar.js"></script>
<!-- <script type="text/javascript" src="/assets/js/jquery.flipcountdown.js"></script> -->
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