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
        <div class="req_count">
            Ваши заявки(2):
            <div class="lane w-[1713px] h-[1px] bg-[#CFCDCD]">

            </div>
        </div>

        <div class="req_container grid grid-cols-2">
            <div class="request">
                <img src="{{asset('img/profile/Rectangle 32.png')}}" alt="" class="req_img">
                <div class="req_title"></div>
                <div class="req_body"></div>

            </div>

        </div>
    </main>


</body>
</html>