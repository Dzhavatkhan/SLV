<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="SLV" content="Сделаем лучше вместе">
    <meta name="request" content="Заявка в администрацию">
    <meta name="SLV" content="Сделаем лучше вместе">
    <meta name="SLV" content="Сделаем лучше вместе">
    <link rel="shortcut icon" href="{{asset('img/index/LOGO.svg')}}" type="image/png">
    <title>SLV</title>
</head>
<body>
    {{--  HEADER  --}}
    <header>
        <nav class="nav-bar">
            <div class="nav-bar-logo">
                <img src="" alt="">
            </div>
            <ul class="navbar-link">
                <li><a href="">Новости</a></li>
                <li><a href="">Заявки</a></li>
                <li><a href="">Контакты</a></li>
            </ul>
            <div class="nav-bar-btn">
                <button>Войти</button>
            </div>
        </nav>
    </header>
    {{--       MAIN        --}}
    <main>
        <section class="slider_section">

        </section>
        <section class="requests_section">
            <p>Заявок: 4</p>
            <div class="requests_container">
                <div class="request_card">
a
                </div>
                <div class="request_card">
b
                </div>
                <div class="request_card">
c
                </div>
                <div class="request_card">
d
                </div>
            </div>
        </section>
        <section class="send_request_section">
            <h2>Есть проблемы в городе? Оставьте заявку!</h2>
            <button>Оставить заявку</button>
        </section>
    </main>
    {{--     FOOTER     --}}
    <footer>
        <div class="footer_icons">
            <ul >
                <li><img class="footer_icon" src="{{asset('img/index/telegram.svg')}}" alt=""></li>
                <li><img class="footer_icon" src="{{asset('img/index/vk.svg')}}" alt=""></li>
                <li><img class="footer_icon" src="{{asset('img/index/odnoklassniki.svg')}}" alt=""></li>
            </ul>
        </div>
        <img src="{{asset('img/index/lane.svg')}}" class="lane" alt="">
        <div class="other_info">
            <ul>
                <li><a href="" class="other_info_a">©️ Copyright</a></li>
                <li class="company_rules"><a href="" class="other_info_a company_rules">Правила компании</a></li>
                <li class="politic_conf"><a href="" class="other_info_a politic_conf">Политика конфидицальности</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
