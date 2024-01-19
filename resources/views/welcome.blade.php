<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SLV</title>
    @vite("resources/css/app.css")
</head>
<body>
    <header class="flex flex-row justify-between items-center px-[95px] pt-[95px]">
        <div>
            <img src="{{asset('img/index/LOGO.svg')}}" alt="" srcset="">
        </div>
        <div class="text-[#243659] text-[18px] no-underline flex gap-x-[97px]">
            <a href="">Новости</a>
            <a href="">Заявка</a>
            <a href="">Контакты</a>
        </div>
        <div>
            <button class="bg-[#0D3C99] rounded-md w-[207px] h-[60px] text-white text-[24px] shadow-xl duration-[0.5s] hover:scale-[1.1] hover:text-[28px]">
                Войти
            </button>
        </div>
    </header>
    <main>
        <section class="slider">

        </section>
        <section class="posts grid grid-cols-2 pl-[384px] gap-y-[150px]  ">
            <div class="post shadow-lg w-[414px]">
                <img src="{{asset('img/login/image 7.png')}}" class="w-full " alt="post_image">
                <div class="post-content px-5 py-2">
                    <p class="text-[20px] title">Плохие дороги <img src="{{asset('img/index/Done.svg')}}" alt="" srcset=""></p>
                    <p class="genre">#дороги</p>
                    <p class="time">11.12.2004</p>
                </div>
            </div>
            <div class="post shadow-lg w-[414px]">
                <img src="{{asset('img/login/image 7.png')}}" class="w-full " alt="post_image">
                <div class="post-content px-5 py-2">
                    <p class="text-[20px] title">Плохие дороги <img class="w-6" src="{{asset('img/index/Done.svg')}}" alt="" srcset=""></p>
                    <p class="genre">#дороги</p>
                    <p class="time">11.12.2004</p>
                </div>
            </div>
            <div class="post shadow-lg w-[414px]">
                <img src="{{asset('img/login/image 7.png')}}" class="w-full " alt="post_image">
                <div class="post-content px-5 py-2">
                    <p class="text-[20px] title">Плохие дороги <img src="{{asset('img/index/Done.svg')}}" alt="" srcset=""></p>
                    <p class="genre">#дороги</p>
                    <p class="time">11.12.2004</p>
                </div>
            </div>
        </section>
        <section class="hav_prob">

        </section>
    </main>
    <footer>

    </footer>
@vite("resources/js/app.js")
</body>
</html>