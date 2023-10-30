<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
    <div class="grid-container">
        <div class="image-block">
            <div class="text-img">
                <h2 class="image-block-title">Добро пожаловать!</h2>
                <p  class="image-block-body">у Вас нет аккаунта?</p>
                <button class="signIn" onclick="goToSignUp()">Регистрация</button>
            </div>
            <div class="dark">
                <img src="{{asset('img/login/image 7.png')}}" alt="">
            </div>
        </div>
        <div class="form-block">
            <h2>Авторизация</h2>
            <form action="" class="form" enctype="multipart/form-data">
                @csrf
                <input type="text" name="login" class="login" placeholder="Логин">
                <input type="text" name="password" class="password" placeholder="Пароль">
                <button type="submit" class="send">Войти</button>
            </form>
        </div>
    </div>
    <script>
        function goToSignUp()
        {
            location.href = "{{route('reg')}}"
        }
    </script>
</body>
</html>
