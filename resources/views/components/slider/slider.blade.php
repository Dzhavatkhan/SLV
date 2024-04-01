<section class="slider mt-10 w-full  h-auto flex flex-col items-center max-md:hidden">
    <div class="slideshow-container flex justify-center w-full pl-[384px] pr-[423px] h-[574px]">

        <div class="mySlides w-full  fade hidden">
          <img src="{{asset('img/login/image 7.png')}}" class="h-full w-full">
        </div>

        <div class="mySlides w-full fade hidden">
          <img src="{{asset('img/login/image 7.png')}}"  class="h-full w-full">
        </div>

        <div class="mySlides  w-full fade hidden">
          <img src="{{asset('img/reg/image 22.svg')}}" class="h-full w-full">
        </div>

        <a class="prev select-none absolute top-1/2 cursor-pointer left-[344px] text-[#0D3C99] text-[24px] max-md:text-[11px]" onclick="plusSlides(-1)">❮</a>
        <a class="next select-none max-md:text-[11px] absolute cursor-pointer top-1/2 right-[384px] text-[#0D3C99] text-[24px]" onclick="plusSlides(1)">❯</a>

    </div>

        <div class="text-center z-10 mt-5 w-full flex justify-center gap-10">
          <span class="dot cursor-pointer bg-[#4e4e4e] rounded-2xl h-4 w-4 " onclick="currentSlide(1)"></span>
          <span class="dot cursor-pointer bg-[#4e4e4e]  rounded-2xl h-4 w-4" onclick="currentSlide(2)"></span>
          <span class="dot cursor-pointer bg-[#4e4e4e]  rounded-2xl h-4 w-4" onclick="currentSlide(3)"></span>
        </div>

</section>
