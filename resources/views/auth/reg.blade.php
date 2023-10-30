<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/reg.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>
<body>
    <div class="grid-container">
        <div class="image-block">
            <div class="text-img">
                <h2 class="image-block-title">Добро пожаловать!</h2>
                <p  class="image-block-body">у Вас уже есть аккаунт?</p>
                <button class="signIn" onclick="goToSignUp()">Войти</button>
            </div>
            <div class="dark">
                <img src="{{asset('img/reg/reg.png')}}" alt="">
            </div>
        </div>
        <div class="form-block">
            <h2>Регистрация</h2>
            <form action="" class="form" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" class="name"  placeholder="ФИО">
                <input type="text" name="login" class="login" placeholder="Логин">
                <label class="input-file">
                    <span class="input-file-text" type="text">Выберите файл</span>
                    <input type="file" name="photo">
                     <span class="input-file-btn"><img src="{{asset('img/reg/image 22.svg')}}" alt=""></span>
                </label>
                <input type="text" name="email" class="email" placeholder="Эл. почта">
                <input type="text" name="password" class="password" placeholder="Пароль">
                <input type="text" name="password_confirm" class="password_confirm" placeholder="Подтвердите пароль">
                <button type="submit" class="send">Отправить</button>
                <label for="" class="checkbox-other">
                    <input id="checkbox" type="checkbox">Соглашаюсь с <a href="https://docs.google.com/?hl=ru">правилами и политикой сайта</a>
                </label>
            </form>
        </div>
    </div>
    <script>
        function goToSignUp()
        {
            location.href = "{{route('login')}}"
        }
        $('.input-file input[type=file]').on('change', function(){
        let file = this.files[0];
        $(this).closest('.input-file').find('.input-file-text').html(file.name);
    });
    $(document).ready(function () {
        $('.form').on('submit', function(e){
            e.preventDefault();
            const check = document.getElementById('checkbox');
            if(checkbox.checked){
                alert('ok');
            }
            else {
                console.log('no send your data');
                console.log(checkbox.value);
            }
        })
    });
    </script>
</body>
</html>
