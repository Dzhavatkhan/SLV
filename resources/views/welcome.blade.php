<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SLV</title>
    @vite("resources/css/app.css")
</head>
<body class="max-md:w-full">
    <header class="flex flex-row justify-between items-center max-md:h-28 px-[95px] pt-[95px] max-md:w-full max-md:px-0 max-md:py-0 max-md:justify-start max-md:pl-[60px] max-md:gap-[200px] max-md:bg-[#526EA5]">
        <img onclick="hamburger()" src="{{ asset('img/index/Menu.svg') }}" class="hidden max-md:block">
        <div>
            <img class="max-md:w-[40%]" src="{{asset('img/index/LOGO.svg')}}" alt="" srcset="">
        </div>
        <div class="text-[#243659] text-[24px] no-underline flex gap-[97px] max-md:hidden">
            <a href="">Новости</a>
            <a href="">Заявка</a>
            <a href="">Контакты</a>
        </div>
        <div class="max-md:hidden">
            @auth
                <input type="submit" onclick="location.href='http://127.0.0.1:8000/profile'" value="Войти" class="bg-[#0D3C99] cursor-pointer rounded-md w-[207px] h-[60px] text-white text-[24px] shadow-xl duration-[0.5s] hover:scale-[1.1]">
            @endauth
            @guest
                <input type="submit" onclick="login()" value="Войти" class="bg-[#0D3C99] cursor-pointer rounded-md w-[207px] h-[60px] text-white text-[24px] shadow-xl duration-[0.5s] hover:scale-[1.1]">
            @endguest
        </div>

        @include('components.modal.hamburger-menu')
    </header>
    <main>
        @include('components.slider.slider')
        <section class="posts mt-5 grid grid-cols-2 place-content-center place-items-center gap-x-0 gap-y-[150px] max-md:grid-cols-1 max-md:p-0 max-md:flex max-md:justify-center max-md:flex-wrap">

        @foreach ($requests as $request)
        <div class="post shadow-lg w-[414px] max-md:flex max-md:justify-center max-md:flex-col max-md:items-center">
                    <img src="{{asset('img/admin/requests/'.$request->photo)}}" onclick="after({{$request->id}}, '{{$request->photo}}', '{{$request->afterImage}}')" title="Нажмите, чтобы увидеть изменения" class="req{{$request->id}} w-full cursor-pointer max-md:h-auto h-[400px]" alt="post_image">
                    <div class="post-content max-md:flex max-md:flex-col max-md:items-center px-5 py-2 max-md:text-center">
                        <p class=" max-md:flex max-md:gap-3 text-[20px] flex gap-[5px] max-md:justify-center">{{$request->title}} <img src="{{asset('img/index/Done.svg')}}" class="w-[20px]" alt="" srcset=""></p>
                        <p class="genre">#{{$request->category}}</p>
                        <p class="time">{{$request->updated_at->format("dd.mm.Y")}}</p>
                    </div>
                </div>
        @endforeach
    </section>

        <section class="mt-10 hav_prob w-[99vw] h-[484px] bg-[#526EA5] flex flex-col justify-center items-center gap-[47px]">
            <p class="text-white text-[48px] max-md:w-[508px] max-md:text-center max-md:text-[32px]" >Есть проблемы в городе? Оставьте заявку!</p>
            <button class=" bg-white w-[433px] h-[71px] max-md:w-[379px] max-md:h-[62px] rounded-[55px] hover:shadow-xl hover:scale-110 duration-75 text-[24px] text-[#526EA5]">Оставить заявку</button>
        </section>
    </main>
    <div class="lane  mt-[119px] hidden w-full h-[1px] bg-[#CFCDCD] max-md:block">

    </div>
    <footer class="mt-16 flex flex-col items-center gap-y-[13px] pb-4 max-md:mt-14">
        <div class="icons flex justify-center gap-[126px]">
            <img src="{{asset('img/index/telegram.svg')}}" alt="">
            <img src="{{asset('img/index/vk.svg')}}" alt="">
            <img src="{{asset('img/index/odnoklassniki.svg')}}" alt="">
        </div>
        <div class="lane w-full h-[1px] bg-[#CFCDCD] max-md:hidden">

        </div>
        <div class="info flex justify-center gap-x-96 max-md:hidden">
            <p class="" >©️ Copyright</p>
            <p class="">Правила компании</p>
            <p>Политика конфидицальности</p>
        </div>
    </footer>
@vite("resources/js/app.js")
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script>
    function login(){
        location.href = "{{route('login')}}"
    }
    let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}
function after(id, before, after){
            console.log(id, before, after);
                let afterImage = `{{asset('img/admin/after/${after}')}}`
                let beforeImage = `{{asset('img/admin/requests/${before}')}}`
                let image = document.querySelector(`.req${id}`)
                if (image.src == afterImage) {
                    image.src = beforeImage
                }
                else{
                    image.src = afterImage
                }

                console.log(image);
}
function hamburger(){
    let modal = document.querySelector(".hamburger")
    console.log(modal)
    modal.classList.toggle("hidden")
}
function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "flex";
  dots[slideIndex-1].className += " active";
}
</script>
</body>
</html>
