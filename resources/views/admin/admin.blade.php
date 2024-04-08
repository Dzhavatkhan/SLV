<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
        form{
            position: relative;
        }
    </style>
    <div class="flex h-screen">
        <div class="side_bar flex py-10  flex-col items-center justify-between w-[369px] bg-[#526EA5] h-screen">
            <div class="admin_header flex flex-col w-full items-center">
                <img src="{{ asset('img/admin/Male User.svg') }}" alt="" srcset="">
                <div class="admin_panel text-white text-[32px] text-center">Admin Dashboard</div>
            </div>
            <div class="w-full flex justify-center flex-col items-center gap-[35px] text-white text-[24px]">
                <div  class="tab p-2 w-full flex justify-center active  cursor-pointer" onclick="openTab(event, 'requests')" id="defaultOpen">Заявки</div>
                <div  class="tab p-2 w-full flex justify-center  cursor-pointer" onclick="openTab(event, 'users')">Юзеры</div>
                <div class="tab p-2 w-full flex justify-center  cursor-pointer" onclick="openTab(event, 'admins')">Админы</div>
                <div class="tab p-2 w-full flex justify-center  cursor-pointer" onclick="openTab(event, 'categories')">Категории</div>

            </div>
            <div class="w-full flex justify-center">
                <img onclick="logout()" class="cursor-pointer" src="{{ asset('img/admin/Logout Rounded Left.svg') }}" alt="">
            </div>
        </div>
        @include('components.requests')
        @include('components.users')
        @include('components.categories')

        <div class="admins w-full tabcontent" id="admins">
        </div>
    </div>


    <div class="close_modal modal hidden absolute inset-0 m-auto bg-black bg-opacity-60 z-10">
        <div class="modal_wrapper w-screen h-screen flex justify-center items-center">
            <div class="modal_content flex flex-col items-start w-[600px] bg-white">
                <div class="modal_header flex items-center border-b pt-5 pb-2 text-[24px] justify-around border-[#C2C2C2] w-full">
                    <div class="text_mod w-full px-10">Вы уверены, что хотите удалить?</div>
                    <span class="pr-5 cursor-pointer" name="delete" onclick="close_w(this)">&times;</span>
                </div>
                <div class="modal_body w-full py-5 px-10 flex gap-10">
                    <button class="yes border border-[#526EA5] w-24 hover:bg-[#526EA5] duration-75 hover:text-white h-10 text-center">Да</button>
                    <button onclick="close_w(this)" class="no border border-[#526EA5] w-24 hover:bg-[#526EA5] duration-75 hover:text-white h-10 text-center">Нет</button>
                </div>
            </div>
        </div>
    </div>

    <div class="edit_modal modal hidden absolute inset-0 m-auto bg-black bg-opacity-60 z-10">
        <div class="modal_wrapper w-screen h-screen flex justify-center items-center">

        </div>
    </div>
    @include("components.modal.createCategory")
    @include("components.alert.alert")
    <script>
        $(document).ready(function () {
            getCategory();
            getRequests();
        });
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
    let alert = document.getElementById("alert")
    let alertMessage = document.getElementById("alert-text")
    let alertInfo = document.getElementById("alert-info");
    function closeAlert(){
            alert.style.display='none'
    }
$(document).ready(function () {
        $('.createCategroyForm').on('submit', function(e){
            e.preventDefault();
                let formData = new FormData(document.querySelector(".createCategroyForm"));
                $.ajax({
                    type: "POST",
                    url: "{{route('createCategory')}}",
                    data: formData,
                    processData: false,
                    cache:false,
                    contentType:false,
                    success: function (response) {
                        console.log(response);
                        createCategoryModal();
                        alert.style.display = "flex"
                        alertMessage.innerHTML = response.message
                        alertInfo.innerHTML += `<img src="{{asset('img/index/Done.svg')}}"/>`
                        getCategory();
                    },
                    error: function(response){
                        alert.style.display = "flex"
                        console.log(response.responseJSON.message);
                        alertMessage.innerHTML = response.responseJSON.message
                    }
                });
        })
    });
function close_w() {
    document.querySelector(".modal").classList.toggle("hidden");
}
function createCategoryModal(){
    let modal = document.querySelector(".createCategory")
    console.log(modal)
    modal.classList.toggle("hidden")
}
function moreModal(id){
    let modal = document.querySelector(`.requestMore${id}`)
    console.log(modal)
    modal.classList.toggle("hidden")
}

function getCategory(){
        $.ajax({
            method: "GET",
            url: "{{route('getCategoryBlade')}}",
            success: function (data) {
                $("#outputCategory").html(data)
            }
        });
}
// async function deleteRequest(id) {
//     let delete = await fetch(`http://127.0.0.1:8000/api/deleteRequest/id${id}`)
//     console.log(delete.json());
// }
function deleteRequest(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    $.ajax({
        type: "DELETE",
        url: `http://127.0.0.1:8000/api/deleteRequest/id${id}`,
        success: function (response) {
            console.log(response);
            getRequests();
        }
    });
}
function doneRequestModal(id){
    let modal = document.querySelector(`.doneRequestModal${id}`)
    console.log(modal)
    modal.classList.toggle("hidden")
}
function doneRequest(id){
    let status = document.getElementById("status")
    let done_btn = document.getElementById("done-btn")
    let formData = new FormData(document.querySelector(".formDone"));
    console.log(document.querySelector(".formDone"));
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    $.ajax({
        type: "POST",
        processData:false,
        cache:false,
        url: `/api/doneRequest/id${id}`,
        data: formData,
        success: function (response) {
            status.innerHTML = ''
            status.innerHTML = 'Решено'
            done_btn.innerHTML = ''
        }
    });
}

async function getRequests(){
    let getRequests = await fetch("{{route('getRequest')}}")
    let requests = await getRequests.json();
    requests = requests.requests
    let div = document.getElementById("request-content")
    requests.forEach(request => {
        if (request.status == "Решено") {
            div.innerHTML += `
        <tr class="text-center border-b h-[60px] border-[#C2C2C2]">
                <td >${request.id}</td>
                <td >${request.author}</td>
                <td >${request.category}</td>
                <td onclick="moreModal(${request.id})">${request.title}</td>
                <td>${request.status}</td>
                <td><img onclick="deleteRequest(${request.id})" class="close cursor-pointer w-12" src="{{ asset('img/admin/Close.svg') }}" alt=""></td>
        </tr>
        <div class="requestMore${request.id} hidden fixed hidden inset-0 m-auto bg-black bg-opacity-60 z-10">
            <div class="w-max h-max fixed inset-0 m-auto z-20">
                <div class="bg-white shadow-md w-[695px] h-[967px] flex flex-col justify-center items-center gap-[50px]">
                    <div class=" flex gap-12 justify-center">
                        <img src="{{asset('img/admin/requests/${request.photo}')}}" class="w-1/2">
                    </div>
                    <div class="flex w-1/2 flex-col items-start gap-[10px]">
                        <div class="title bold">${request.title}</div>
                        <div class="body">${request.body}</div>
                    </div>
                    <div class="text-[32px] flex justify-start" onclick="moreModal(${request.id})">
                        Закрыть
                    </div>
                </div>
            </div>
        </div>
        `
        } else {
            div.innerHTML += `
        <tr class="text-center border-b h-[60px] border-[#C2C2C2]">
                <td >${request.id}</td>
                <td >${request.author}</td>
                <td >${request.category}</td>
                <td onclick="moreModal(${request.id})">${request.title}</td>
                <td id="status">${request.status}</td>
                <td><img onclick="deleteRequest(${request.id})" class="close cursor-pointer w-12" src="{{ asset('img/admin/Close.svg') }}" alt=""></td>
                <td id="done-btn"><img src="{{asset('img/index/Done.svg')}}" class="cursor-pointer" onclick="doneRequestModal(${request.id})" alt=""></td>
        </tr>

        <div class="requestMore${request.id} hidden fixed hidden inset-0 m-auto bg-black bg-opacity-60 z-10">
            <div class="w-max h-max fixed inset-0 m-auto z-20">
                <div class="bg-white shadow-md w-[695px] h-[967px] flex flex-col justify-center items-center gap-[50px]">
                    <div class=" flex gap-12 justify-center">
                        <img src="{{asset('img/admin/requests/${request.photo}')}}" class="w-1/2">
                    </div>
                    <div class="flex w-1/2 flex-col items-start gap-[10px]">
                        <div class="title bold">${request.title}</div>
                        <div class="body">${request.body}</div>
                    </div>
                    <div class="text-[32px] flex justify-start" onclick="moreModal(${request.id})">
                        Закрыть
                    </div>
                    <form enctype="multipart/form-data" class="w-full h-full">
                    <div class="form_header w-full flex justify-around" >
                        <div>

                        </div>
                        <div>
                            Принять заявку
                        </div>
                        <div class="cursor-pointer">
                            Закрыть
                        </div>
                    </div>
                    <div class="flex flex-col gap-[50px]">
                        <input type="file" name="afterImage">
                        <button class="bg-[#0D3C99] text-white" onclick="doneRequest(${request.id})">Оправить</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

    <div class="doneRequestModal${request.id} fixed hidden inset-0 m-auto bg-black bg-opacity-60 z-10">
        <div class="w-max h-max fixed inset-0 m-auto z-20">
            <div class="bg-white shadow-md w-[695px] h-[500px] flex flex-col items-center gap-[50px]">
                <form enctype="multipart/form-data" class="w-full h-full">
                    <div class="form_header w-full flex justify-around" >
                        <div>

                        </div>
                        <div>
                            Принять заявку
                        </div>
                        <div class="cursor-pointer">
                            Закрыть
                        </div>
                    </div>
                    <div class="flex flex-col gap-[50px]">
                        <input type="file" name="afterImage">
                        <button class="bg-[#0D3C99] text-white" onclick="doneRequest(${request.id})">Оправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        `
        }

    });
}
function openTab(evt, divName) {
    let i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tab");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    console.log(document.getElementById(divName));
    document.getElementById(divName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
    </script>
    @vite("resources/js/admin.js")
</body>
</html>
