<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <header>
        <div class="user-info">
            <img src="{{asset('img/index/odnoklassniki.svg')}}" alt="" class="user-avatar">
            <button class="edit_btn">
                <img src="{{asset('img/profile/edit.svg')}}" class="edit" alt="">
            </button>
            <p class="user-name">
                вОля Пархмоенко
            </p>
        </div>
        <div class="request_add">
            <button class="request_btn">
                <img src="{{asset('img/profile/Add.svg')}}" alt="">
            </button>
            <a href="">Оставить заявку</a>
        </div>
        <div class="logout">
            <img src="" alt="">
        </div>
    </header>
    <main>
        <div class="header-container">
            <p class="request_quantity">

            </p>
            <img src="" alt="" class="lane">
        </div>
        <div class="container">
            <div class="request">
                <div class="request_header">
                    <img src="" alt="">
                </div>
                <div class="request_main">
                    <div class="request_title">
                        <h2 class="title">
                            Плохие дороги
                        </h2>
                        <img src="" alt="" class="status">
                    </div>
                    <div class="request_body">
                        Из-за плохих дорог возникло ДТП, прошу властей обратить на это внимание
                    </div>

                </div>
                <div class="request_footer">
                    <p class="time"></p>
                    <img src="" alt="">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </main>
</body>
</html>