<div class="post__title" style="">
    <div class="post__title">
        Текстовая реклама
    </div>
    <div id="textreklama" class="reklama">
        <div class="reklama-main">
            <a href="#">
                <b>Скрипт букса за 300 рублей</b>
                <span>Букс с мультисерфингом, баннера и ссылки</span>
                <p>promomaxxx.ru</p>
            </a>
        </div>
        <div class="reklama-main">
            <a href="#">
                <b>Скрипт букса за 600 рублей</b>
                <span>Букс с мультисерфингом, красивый дизайн</span>
                <p>fitobonus.ru</p>
            </a>
        </div>
        <div class="reklama-main">
            <a href="#">
                <b>Скрипт букса за 300 рублей</b>
                <span>Букс с мультисерфингом, баннера и ссылки</span>
                <p>promomaxxx.ru</p>
            </a>
        </div>
        <div class="reklama-main">
            <a href="#">
                <b>Скрипт букса за 300 рублей</b>
                <span>Букс с мультисерфингом, баннера и ссылки</span>
                <p>promomaxxx.ru</p>
            </a>
        </div>
        <div class="reklama-main">
            <a href="#">
                <b>Скрипт букса за 300 рублей</b>
                <span>Букс с мультисерфингом, баннера и ссылки</span>
                <p>promomaxxx.ru</p>
            </a>
        </div>
    </div>
</div>
<script type="text/javascript">
    bos = '<div class="reklama-main">';
    axir = '</div>';
    fetch('/api/ads/reklama/textreklama').then(
        function(response){
            return response.json();
        }).then(function(data){
            // console.log(data);
            var reklama = '';
            data.data.forEach((rek)=> {
                // console.log(rek);
                reklama += bos;
                reklama += rek.url;
                reklama += axir;
            })
            document.getElementById("textreklama").innerHTML = reklama;
        })
</script>
