<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$user->name}}</title>
    @vite("resources/css/app.css")
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <header class="w-[99vw] bg-[#526EA5] px-40 py-20 flex justify-between items-center">
        <div class="user_info flex flex-col items-center">
            <div class="user_image relative">
                <img src="{{asset('img/avatars/'.Auth::user()->image)}}" class="w-40 rounded-[100%] max-md:w-20" alt="">
                <div onclick="modal()" class="user_edit cursor-pointer max-md:w-10 absolute bottom-0 right-0 bg-white rounded-full border-[#526EA5] border-4 p-2">
                    <img  src="{{asset('img/profile/edit.svg')}}" class="w-7" alt="">
                </div>
            </div>

            <div class="text-white text-[24px] max-md:text-[16px]"></div>
        </div>
        <div class="send_req flex flex-col gap-[7px] items-center">
            <img onclick="requestForm()" src="{{asset('img/profile/Add.svg')}}" class="max-md:w-20" alt="">
            <div onclick="requestForm()" class="text-white text-[20px] max-md:text-[14px]">Оставьте заявку</div>
        </div>
        <div class="logout max-md:w-16" onclick="logout()">
            <img src="{{asset('img/profile/Logout.svg')}}" alt="" srcset="">
        </div>
    </header>

    <main>
        <div class="req_count py-5 px-40 flex flex-col gap-y-2 text-[32px] text-[#526EA5]">
            <div class="count ">Ваши заявки(2):</div>
            <div class="lane h-[1px] bg-[#CFCDCD]">

            </div>
        </div>

        <div class="req_container gap-y-10 px-40  py-10 gap-x-16 place-items-center place-content-center max-md:grid-cols-1  max-sm:grid-cols-1  grid grid-cols-3">
            <div class="request shadow-lg cursor-pointer pb-2 hover:shadow-xl duration-150 hover:scale-100 ">
                <img src="{{asset('img/profile/Rectangle 32.png')}}" alt="" class="req_img w-full">
                <div class="mt-[13px] req_title px-5 flex justify-between">
                    <p class="text-[24px]">Плохие дороги</p>
                    <img src="{{asset('img/profile/Ok.svg')}}" class="select-none" alt="" srcset="">
                </div>
                <p class="px-5 text-[20px]">Из-за плохих дорог возникло ДТП, прошу властей обратить на это внимание</p>
                <div class="content px-5 pt-3 pb-3 w-full flex justify-between">
                    <p class="text-[16px] text-[#96969696]">11:03 11.12.2019</p>
                    <div class="icons inline-flex gap-2">
                        <img src="{{asset('img/profile/edit.svg')}}" class="cursor-pointer w-[25px] " alt="icon" alt="">
                        <img src="{{asset('img/profile/Delete.svg')}}" class="cursor-pointer w-[25px] " alt="icon" alt="">
                    </div>
                </div>
            </div>
            <div class="request shadow-lg cursor-pointer pb-2 hover:shadow-xl duration-150 hover:scale-100 ">
                <img src="{{asset('img/profile/Rectangle 32.png')}}" alt="" class="req_img w-full">
                <div class="mt-[13px] req_title px-5 flex justify-between">
                    <p class="text-[24px]">Плохие дороги</p>
                    <img src="{{asset('img/profile/Ok.svg')}}" class="select-none" alt="" srcset="">
                </div>
                <p class="px-5 text-[20px]">Из-за плохих дорог возникло ДТП, прошу властей обратить на это внимание</p>
                <div class="content px-5 pt-3 pb-3 w-full flex justify-between">
                    <p class="text-[16px] text-[#96969696]">11:03 11.12.2019</p>
                    <div class="icons inline-flex gap-2">
                        <img src="{{asset('img/profile/edit.svg')}}" class="cursor-pointer w-[25px] " alt="icon" alt="">
                        <img src="{{asset('img/profile/Delete.svg')}}" class="cursor-pointer w-[25px] " alt="icon" alt="">
                    </div>
                </div>
            </div>
            <div class="request shadow-lg cursor-pointer pb-2 hover:shadow-xl duration-150 hover:scale-100 ">
                <img src="{{asset('img/profile/Rectangle 32.png')}}" alt="" class="req_img w-full">
                <div class="mt-[13px] req_title px-5 flex justify-between">
                    <p class="text-[24px]">Плохие дороги</p>
                    <img src="{{asset('img/profile/Ok.svg')}}" class="select-none" alt="" srcset="">
                </div>
                <p class="px-5 text-[20px]">Из-за плохих дорог возникло ДТП, прошу властей обратить на это внимание</p>
                <div class="content px-5 pt-3 pb-3 w-full items-center flex justify-between">
                    <p class="text-[16px] max-lg:text-[10px] text-[#96969696]">11:03 11.12.2019</p>
                    <div class="icons inline-flex gap-2">
                        <img src="{{asset('img/profile/edit.svg')}}" class="cursor-pointer w-[25px] max-lg:w-[20px] " alt="icon" alt="">
                        <img src="{{asset('img/profile/Delete.svg')}}" class="cursor-pointer w-[25px] max-lg:w-[20px] " alt="icon" alt="">
                    </div>
                </div>
            </div>
            <div class="request shadow-lg cursor-pointer pb-2 hover:shadow-xl duration-150 hover:scale-100 ">
                <img src="{{asset('img/profile/Rectangle 32.png')}}" alt="" class="req_img w-full">
                <div class="mt-[13px] req_title px-5 flex justify-between">
                    <p class="text-[24px]">Плохие дороги</p>
                    <img src="{{asset('img/profile/Ok.svg')}}" class="select-none" alt="" srcset="">
                </div>
                <p class="px-5 text-[20px]">Из-за плохих дорог возникло ДТП, прошу властей обратить на это внимание</p>
                <div class="content px-5 pt-3 pb-3 w-full flex justify-between">
                    <p class="text-[16px] text-[#96969696]">11:03 11.12.2019</p>
                    <div class="icons inline-flex gap-2">
                        <img src="{{asset('img/profile/edit.svg')}}" class="cursor-pointer w-[25px] " alt="icon" alt="">
                        <img src="{{asset('img/profile/Delete.svg')}}" class="cursor-pointer w-[25px] " alt="icon" alt="">
                    </div>
                </div>
            </div>
            <div class="request shadow-lg cursor-pointer pb-2 hover:shadow-xl duration-150 hover:scale-100 ">
                <img src="{{asset('img/profile/Rectangle 32.png')}}" alt="" class="req_img w-full">
                <div class="mt-[13px] req_title px-5 flex justify-between">
                    <p class="text-[24px]">Плохие дороги</p>
                    <img src="{{asset('img/profile/Ok.svg')}}" class="select-none" alt="" srcset="">
                </div>
                <p class="px-5 text-[20px]">Из-за плохих дорог возникло ДТП, прошу властей обратить на это внимание</p>
                <div class="content px-5 pt-3 pb-3 w-full flex justify-between">
                    <p class="text-[16px] text-[#96969696]">11:03 11.12.2019</p>
                    <div class="icons inline-flex gap-2">
                        <img src="{{asset('img/profile/edit.svg')}}" class="cursor-pointer w-[25px] " alt="icon" alt="">
                        <img src="{{asset('img/profile/Delete.svg')}}" class="cursor-pointer w-[25px] " alt="icon" alt="">
                    </div>
                </div>
            </div>
            <div class="request shadow-lg cursor-pointer pb-2 hover:shadow-xl duration-150 hover:scale-100 ">
                <img src="{{asset('img/profile/Rectangle 32.png')}}" alt="" class="req_img w-full">
                <div class="mt-[13px] req_title px-5 flex justify-between">
                    <p class="text-[24px]">Плохие дороги</p>
                    <img src="{{asset('img/profile/Ok.svg')}}" class="select-none" alt="" srcset="">
                </div>
                <p class="px-5 text-[20px]">Из-за плохих дорог возникло ДТП, прошу властей обратить на это внимание</p>
                <div class="content px-5 pt-3 pb-3 w-full items-center flex justify-between">
                    <p class="text-[16px] max-lg:text-[10px] text-[#96969696]">11:03 11.12.2019</p>
                    <div class="icons inline-flex gap-2">
                        <img src="{{asset('img/profile/edit.svg')}}" class="cursor-pointer w-[25px] max-lg:w-[20px] " alt="icon" alt="">
                        <img src="{{asset('img/profile/Delete.svg')}}" class="cursor-pointer w-[25px] max-lg:w-[20px] " alt="icon" alt="">
                    </div>
                </div>
            </div>
        </div>





@include('components.modal.editProfile')
@include("components.modal.requestForm")
    </main>

    <script>

        function modal(){
            let modal = document.querySelector(".modal_back")
            modal.classList.toggle("hidden")
        }
        function requestForm(){
            let modal = document.querySelector(".requestForm")
            console.log(modal)
            modal.classList.toggle("hidden")
        }
        const logout = () => {
            $.ajax({
            type: "GET",
            url: "{{route('logout')}}",
            processData:false,
            cache: false,
            success: function (response) {
                location.href = "{{route('home')}}"
            },
            error: function(err){
                console.log(err);

            }
        });

        }



    </script>
</body>
</html>
