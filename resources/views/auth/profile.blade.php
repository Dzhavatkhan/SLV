<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$user->name}}</title>
    @vite("resources/css/app.css")
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <header class="w-[99vw] bg-[#526EA5] px-40 py-20 flex justify-between items-center max-md:gap-[60px]">
        <div class="user_info flex flex-col items-center max-md:w-40">
            <div class="user_image relative">
                <img src="{{asset('img/avatars/'.Auth::user()->image)}}" class="w-32 h-28 rounded-[100%] max-md:w-20" alt="">
                <div onclick="modal()" class="user_edit cursor-pointer max-md:w-10 absolute bottom-0 right-0 bg-white rounded-full border-[#526EA5] border-4 p-2">
                    <img  src="{{asset('img/profile/edit.svg')}}" class="w-7 max-md:w-14" alt="">
                </div>
            </div>

            <div class="text-white text-[24px] max-md:text-[16px]"></div>
        </div>
        <div class="send_req flex flex-col gap-[7px] items-center cursor-pointer">
            <img onclick="requestForm()" src="{{asset('img/profile/Add.svg')}}" class="max-md:w-20" alt="">
            <div onclick="requestForm()" class="text-white text-[20px] text-center max-md:text-[14px]">Оставьте заявку</div>
        </div>
        <div class="logout max-md:w-16 cursor-pointer" onclick="logout()">
            <img src="{{asset('img/profile/Logout.svg')}}" alt="" srcset="">
        </div>
    </header>

    <main id="main" class="h-screen">

    </main>

    <script>
        $(document).ready(function () {
            getMyRequests();
            getCategories();
        });
        const getCategories = async() => {
            let div = document.getElementById("category")
            let response = await fetch("{{route('getCategory')}}");
            let categories = await response.json()
            categories = categories.categories
            console.log(categories);
            for (let index = 0; index < categories.length; index++) {
                div.innerHTML += `<option value="${categories[index].id}">${categories[index].name}</option>`

            }
        }
        function getMyRequests(){
            $.ajax({
                type: "GET",
                url: "{{route('getMyRequests')}}",
                success: function (data) {
                    $("#main").html(data);
                }
            });
        }
        function modal(){
            let modal = document.querySelector(".modal_back")
            modal.classList.toggle("hidden")
        }
        function requestForm(){
            let modal = document.querySelector(".requestForm")
            console.log(modal)
            modal.classList.toggle("hidden")
        }
        function deleteRequest(id){
            $.ajax({
                type: "DELETE",
                url: `api/deleteRequest/id${id}`,
                success: function (response) {
                    getMyRequests();
                }
            });
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
