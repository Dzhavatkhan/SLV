<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite("resources/css/app.css")
    <title>Panel</title>
</head>
<body>
    <style>
        .active{
            background-color: white;
            color: #526EA5;

        }
    </style>
    <div class="container flex">
        <div class="side_bar flex py-10  flex-col items-center justify-between w-[369px] bg-[#526EA5] h-screen">
            <div class="admin_header flex flex-col w-full items-center">
                <img src="{{ asset('img/admin/Male User.svg') }}" alt="" srcset="">
                <div class="admin_panel text-white text-[32px]">Admin Dashboard</div>
            </div>
            <div class="w-full flex justify-center flex-col items-center gap-[35px] text-white text-[24px]">
                <div  class="tab p-2 w-full flex justify-center active  cursor-pointer">Заявки</div>
                <div  class="tab p-2 w-full flex justify-center  cursor-pointer">Юзеры</div>
                <div class="tab p-2 w-full flex justify-center  cursor-pointer">Админы</div>
            </div>
            <div class="w-full flex justify-center">
                <img src="{{ asset('img/admin/Logout Rounded Left.svg') }}" alt="">
            </div>
        </div>
        <div class="requests active:block w-full" id="requests">

        </div>
        <div class="users" id="users">

        </div>
    </div>
    @vite("resources/js/admin.js")
</body>
</html>
