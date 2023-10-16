<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">
                <button type="submit">Отправить</button>
                <label for="check" class="container">Соглашаюсь с <a href="">правилами и политикой сайта</a>
                    <input type="checkbox" name="check" id="check">
                    <span class="checkmark"></span>
                </label>
            </form>
        </div>
    </div>
</body>
</html>
