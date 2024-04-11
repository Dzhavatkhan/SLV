<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Itim&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    @vite("resources/css/app.css")
    <title>Авторизация</title>
</head>
<body>
    <div class="app grid grid-cols-2 h-screen max-md:hidden max-sm:hidden">
            <div class="decorativeDiv z-0 h-full w-full">
                    <div class="darkContent w-full h-full z-0 flex flex-col items-center justify-center gap-8">
                        <h2 class="text-white z-30 text-[64px] max-xl:text-[48px] font-[Itim]">
                            Добро пожаловать!
                        </h2>
                        <div class="question z-30 text-3xl max-xl:text-2xl text-white">
                            У вас нет аккаунта?
                        </div>
                        <button onclick="location.href = '{{route('reg')}}'" class="z-30 w-80 h-16 text-[32px] max-xl:text-xl  duration-150 hover:text-white hover:bg-[#526EA5] bg-white text-[#526EA5] rounded-md">Регистрация</button>
                    </div>


             </div>

        <div class="formDiv h-full flex flex-col justify-center items-center gap-y-[143px] text-[48px] pt-[90px]">
            <h2 class="font-[Ubuntu]">Вход</h2>
            <form enctype="multipart/form-data" class="form flex flex-col gap-y-[143px]" >
                <div class="inputs flex flex-col gap-y-[74px]">
                    @csrf
                    <input type="text" name="login" class="login border text-[32px] pl-[25px] py-[10px] h-[60px] outline-none border-[#526EA5]" {{old('login')}} placeholder="Логин">
                    <input type="password" name="password" class=" password border text-[32px] pl-[25px] py-[10px] h-[60px] outline-none border-[#526EA5] " {{old('password')}} placeholder="Пароль">
                </div>


                <button  type="button"  class="btnForm bg-[#526EA5] text-[32px] text-white rounded-lg">Войти</button>
                {{-- <p>У вас нет аккаунта? <a href="{{route('reg')}}">Зарегистрироваться</a></p> --}}

            </form>
        </div>
        <div id="alert" class="w-[350px] bg-white shadow-lg fixed bottom-5 right-5 p-[10px] hidden rounded-md items-start justify-end gap-2">
            <div class="product-info flex">
              <div id="alert-text"></div>
            </div>
            <button class="close-btn bg-transparent text-[#526EA5] " onclick="closeAlert()">Закрыть</button>
        </div>
    </div>


    <div class="mobileApp h-screen w-[99vw] hidden max-sm:flex max-md:flex flex-col gap-[183px]">
        <div class="mobileHeader h-[100px] w-full flex py-7 justify-center items-center">
            <img class="absolute w-[93px] top-2 left-[44px]" src="{{asset('img/index/LOGO.svg')}}" alt="">
            <div class="text-[36px] text-[#0D3C99]">Авторизация</div>
        </div>
        <div class="mobilForm w-full ">
            <form class="mobilForm lala flex flex-col items-center gap-[189px]">
                <div class="inputs flex flex-col items-center gap-[80px]">
                    <div class="login-inp flex flex-col gap-3">
                        <input type="text" name="login" class="rounded-md border w-[400px] p-2 border-[#D5D6D8] outline-none bg-[#F0F2F5]" placeholder="Логин">
                        <div class="error text-red-400"></div>
                    </div>
                    <input type="text" name="password" class="rounded-md border w-[400px] p-2 border-[#D5D6D8] outline-none bg-[#F0F2F5]" placeholder="Пароль">
                </div>
                <div class="btn w-96">
                    <button  type="click" class="font-[Ubuntu] btnMobForm w-full  h-16 rounded-lg bg-[#526EA5] text-white text-[24px]">Войти</button>
                    <p>У вас нет аккаунта? <a href="{{route('reg')}}">Зарегистрироваться</a></p>
                </div>
            </form>
        </div>
    </div>

    @vite("resources/js/app.js")


    <script>
        let alert = document.getElementById("alert")
        let alertMessage = document.getElementById("alert-text")
        function closeAlert(){
            alert.style.display='none'
        }
    $(document).ready(function () {
        $('.btnForm').on('click', function(e){
            e.preventDefault();
            let formData = new FormData(document.querySelector(".form"));

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $.ajax({
                method: "POST",
                url: "{{route('signIn')}}",
                data:formData,
                processData: false,
                cache: false,
                contentType:false
            })
            .done(function(response) {
                console.log(response.role_id);
                if (response.role_id == 1) {
                    location.href = "{{route('admin')}}"
                }
                else{
                    location.href = "{{route('profile')}}"
                }
            })
            .fail(function(response) {

                console.log("Error: ", response.responseJSON.error);
                alert.style.display = "flex"
                alertMessage.innerHTML = response.responseJSON.error

            });
        })
    })

    $(document).ready(function () {
        $('.btnMobForm').on('click', function(e){
            e.preventDefault();
            console.log(document.querySelector(".mobilForm"));
            let formData = new FormData(document.querySelector(".lala"));

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $.ajax({
                method: "POST",
                url: "{{route('signIn')}}",
                data:formData,
                processData: false,
                cache: false,
                contentType:false
            })
            .done(function(response) {
                console.log(response.role_id);
                if (response.role_id == 1) {
                    location.href = "{{route('admin')}}"
                }
                else{
                    location.href = "{{route('profile')}}"
                }
            })
            .fail(function(response) {

                console.log("Error: ", response.responseJSON.error);
                document.querySelector(".error").innerHTML = ''
                document.querySelector(".error").innerHTML = response.responseJSON.error

            });
        })
    })
    </script>
</body>
</html>
