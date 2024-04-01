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
    @vite("resources/css/app.css")
    <title>Регистрация</title>
</head>
<body class="max-md:bg-white">
    <div class="grid grid-cols-2 max-md:grid-cols-1">
        <div class="imageBlock max-md:hidden w-full h-screen" style="background-image:url('{{asset('img/reg/reg.png')}}'); background-repeat: no-repeat; background-size: 100%;">
            <div class="textImg w-full h-screen flex flex-col justify-center items-center text-white gap-4">
                <h2 class="imageBlockTitle text-[48px] font-[Ubuntu]">Добро пожаловать!</h2>
                <p  class="imageBlockBody text-[24px] font-[Ubuntu]">у Вас уже есть аккаунт?</p>
                <button class="signIn text-[24px] font-[Ubuntu] bg-white text-[#526EA5] w-1/4 p-2 rounded-md hover:text-white hover:bg-[#526EA5] duration-200" onclick="goToSignUp()">Войти</button>
            </div>
        </div>

        <div class="formBlock flex flex-col items-center justify-center h-screen w-full gap-9">
            <h2 class="text-[32px] max-md:text-[#0D3C99]">Регистрация</h2>
            <form  class="form flex max-md:w-[422px] flex-col gap-20 items-center w-[433px]" enctype="multipart/form-data">
                <div class="inputs flex flex-col items-center gap-8 w-full">
                    @csrf
                    <input type="text" name="name" class=" bg-white h-14  w-full border border-[#D5D6D8] rounded-md pl-4 outline-none text-[20px]"  placeholder="ФИО">
                    <input type="text" name="login" class=" bg-white h-14 w-full  border border-[#D5D6D8] rounded-md pl-4 outline-none text-[20px]" placeholder="Логин">
                    <label class="input-file h-14  border border-[#D5D6D8] w-full flex justify-between items-center  bg-white rounded-md pl-4 outline-none text-[20px]">
                        <span class="input-file-text float-left text-[#9CA3B7] " type="text">Выберите файл</span>
                        <input type="file" name="image">
                        <span class=" bg-[#526EA5] h-full px-[20px] py-[10px] flex items-center"><img class="w-7" src="{{asset('img/reg/image 22.svg')}}" alt=""></span>
                    </label>
                    <input type="text" name="email" class=" bg-white w-full h-14  border border-[#D5D6D8] rounded-md pl-4 outline-none text-[20px]" placeholder="Эл. почта">
                    <input type="text" name="password" class=" bg-white w-full h-14 border border-[#D5D6D8] rounded-md pl-4 outline-none text-[20px]" placeholder="Пароль">
                    <input type="text" name="password_confirm" class=" bg-white w-full h-14  border border-[#D5D6D8] rounded-md pl-4 outline-none text-[20px]" placeholder="Подтвердите пароль">
                </div>
                <div class="btn w-full flex flex-col items-center justify-center gap-2">
                    <button type="submit" class="rounded-md w-full bg-[#526EA5] hover:scale-110  text-[20px] text-white duration-200 h-14">Отправить</button>
                    <label for="" class="flex items-center">
                        <input id="checkbox" class="w-10 h-5" type="checkbox">Соглашаюсь с<pre> </pre><a class="text-[#526EA5] underline underline-[#526EA5]" href="https://docs.google.com/?hl=ru">  правилами и политикой сайта</a>
                    </label>
                </div>

            </form>
            <div id="alert" class="w-[350px] bg-white fixed bottom-5 right-5 p-[10px] hidden rounded-lg items-start justify-end gap-2">
                <div class="product-info flex">
                  <img src="{{asset('img/admin/Male User.svg')}}" alt="Product Image" class="mr-[10px] w-12 h-12" id="product-image" />
                  <div id="alert-text"></div>
                </div>
                <button class="close-btn bg-transparent text-[#526EA5] " onclick="closeAlert()">Close</button>
            </div>
        </div>
    </div>
    @vite("resources/js/app.js")
    <script>
        function goToSignUp()
        {
            location.href = "{{route('login')}}"
        }
        let alert = document.getElementById("alert")
        let alertMessage = document.getElementById("alert-text")

        function closeAlert(){
            alert.style.display='none'
        }

        $('.input-file input[type=file]').on('change', function(){
        let file = this.files[0];
        $(this).closest('.input-file').find('.input-file-text').html(file.name);
    });

    $(document).ready(function () {
        $('.form').on('submit', function(e){
            e.preventDefault();
            const checkbox = document.getElementById('checkbox');
            if(checkbox.checked){
                let formData = new FormData(document.querySelector(".form"));
                $.ajax({
                    type: "POST",
                    url: "{{route('signUp')}}",
                    data: formData,
                    processData: false,
                    cache:false,
                    contentType:false,
                    success: function (response) {
                        console.log(response);
                        location.href = "{{route('profile')}}"
                    },
                    error: function(response){
                        alert.style.display = "flex"
                        console.log(response.responseJSON.message);
                        alertMessage.innerHTML = response.responseJSON.message
                    }
                });
            }
            else {
                console.log(alert);
                alert.style.display = "flex"
                alertMessage.innerHTML = "Вы не дали согласия"
            }
        })
    });
    </script>
</body>
</html>
