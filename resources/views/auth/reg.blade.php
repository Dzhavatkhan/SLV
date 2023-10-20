<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
    <div class="grid-container">
        <div class="image-block">
            <div class="text-img">
                <h2>Добро пожаловать!</h2>
                <p>у Вас уже есть аккаунт?</p>
                <a href="">Регистрация</a>
            </div>
            <div class="dark">
                <img src="{{asset('img/reg/reg.png')}}" alt="">
            </div>
        </div>
        <div class="form-block">
            <h2>Регистрация</h2>
            <form action="" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" class="name"  placeholder="ФИО">
                <input type="text" name="login" class="login" placeholder="Логин">
                <input type="file" name="photo" class="photo">
                <input type="text" name="email" class="email" placeholder="Эл. почта">
                <input type="text" name="password" class="password" placeholder="Пароль">
                <input type="text" name="password_confirm" class="password_confirm" placeholder="Подтвердите пароль">
                <button type="submit">Отправить</button>
                <label for="" class="checkbox-other">
                    <input type="checkbox">Соглашаюсь с <a href="https://docs.google.com/?hl=ru">правилами и политикой сайта</a>
                </label>
            </form>
        </div>
    </div>
</body>
</html>
