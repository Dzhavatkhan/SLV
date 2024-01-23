<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your profile</title>
    @vite("resources/css/app.css")

</head>
<body>
    <header>

    </header>

    <main>
        {{-- <div class="req_count w-[99vw]">
            Ваши заявки(2):
            <div class="lane mx-10 w-[1695px] h-[1px] bg-[#CFCDCD]">

            </div>
        </div> --}}

        <div class="req_container gap-y-10 gap-x-5  place-items-center place-content-center max-md:grid-cols-1  max-sm:grid-cols-1 mt-10  grid grid-cols-2">
            <div class="request shadow-lg cursor-pointer w-1/2 pb-2 ">
                <img src="{{asset('img/profile/Rectangle 32.png')}}" alt="" class="req_img w-full">
                <div class="mt-[13px] req_title px-5 flex justify-between">
                    <p class="text-[24px]">Плохие дороги</p>
                    <img src="{{asset('img/profile/Ok.svg')}}" class="select-none" alt="" srcset="">
                </div>
                <p class="px-5 text-[20px]">Из-за плохих дорог возникло ДТП, прошу властей обратить на это внимание</p>
                <div class="content px-5 pt-3 pb-3 w-full flex justify-between">
                    <p class="text-[13px] text-[#96969696]">11:03 11.12.2019</p>
                    <div class="icons inline-flex gap-2">
                        <img src="{{asset('img/profile/edit.svg')}}" class="cursor-pointer w-[25px] " alt="icon" alt="">
                        <img src="{{asset('img/profile/Delete.svg')}}" class="cursor-pointer w-[25px] " alt="icon" alt="">
                    </div>
                </div>
            </div>
            <div class="request shadow-lg cursor-pointer w-1/2 pb-2 ">
                <img src="{{asset('img/profile/Rectangle 32.png')}}" alt="" class="req_img w-full">
                <div class="mt-[13px] req_title px-5 flex justify-between">
                    <p class="text-[24px]">Плохие дороги</p>
                    <img src="{{asset('img/profile/Ok.svg')}}" class="select-none" alt="" srcset="">
                </div>
                <p class="px-5 text-[20px]">Из-за плохих дорог возникло ДТП, прошу властей обратить на это внимание</p>
                <div class="content px-5 pt-3 pb-3 w-full items-center flex justify-between">
                    <p class="text-[13px] max-lg:text-[10px] text-[#96969696]">11:03 11.12.2019</p>
                    <div class="icons inline-flex gap-2">
                        <img src="{{asset('img/profile/edit.svg')}}" class="cursor-pointer w-[25px] max-lg:w-[20px] " alt="icon" alt="">
                        <img src="{{asset('img/profile/Delete.svg')}}" class="cursor-pointer w-[25px] max-lg:w-[20px] " alt="icon" alt="">
                    </div>
                </div>
            </div>

        </div>
    </main>


</body>
</html>
