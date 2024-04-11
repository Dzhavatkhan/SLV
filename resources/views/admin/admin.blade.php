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
    </style>
    <div class="flex h-screen">
        <div class="side_bar flex py-10  flex-col items-center justify-between w-[369px] bg-[#526EA5] h-screen">
            <div class="admin_header flex flex-col w-full items-center">
                <img src="{{ asset('img/admin/Male User.svg') }}" alt="" srcset="">
                <div class="admin_panel text-white text-[32px] text-center">Admin Dashboard</div>
            </div>
            <div class="w-full flex justify-center flex-col items-center gap-[35px] text-white text-[24px]">
                <div  class="tab p-2 w-full flex justify-center active  cursor-pointer" onclick="openTab(event, 'requests')" id="defaultOpen">Заявки</div>
                <div class="tab p-2 w-full flex justify-center  cursor-pointer" onclick="openTab(event, 'categories')">Категории</div>

            </div>
            <div class="w-full flex justify-center">
                <img onclick="logout()" class="cursor-pointer" src="{{ asset('img/admin/Logout Rounded Left.svg') }}" alt="">
            </div>
        </div>
        @include('components.requests')
        @include('components.users')
        @include('components.categories')

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
orm>
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
function cancelRequest(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        console.log(document.querySelector(".cancelForm"));
        let status = document.getElementById("status")
        let done_btn = document.getElementById("done-btn")
        let close = document.querySelector("#cancel-btn")
        let formData = new FormData(document.querySelector(".cancelForm"))
    $.ajax({

        type: "POST",
        processData: false,
        cache: false,
        contentType: false,
        data: formData,
        url: `http://127.0.0.1:8000/api/cancelRequest/id${id}`,
        success: function (response) {
            console.log(response);
            status.innerHTML = '';
            done_btn.innerHTML = '';
            status.innerHTML = 'Отклонено';
            close.innerHTML = '';
            document.querySelector(`.cancelModal${id}`).classList.toggle("hidden")

        }
    });
}
function doneRequest(id){
    let status = document.getElementById("status")
    let done_btn = document.getElementById("done-btn")
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let formData = new FormData(document.querySelector(".afterForm"));
    formData.append('afterImage', $('input[name="afterImage"]')[0].files[0]);

    $.ajax({
        type: "POST",
        data: formData,
        processData: false,
        contentType: false, // Не устанавливайте заголовок Content-Type
        url: `/api/doneRequest/id${id}`,
        success: function (response) {
            status.innerHTML = '';
            status.innerHTML = 'Решено';
            done_btn.innerHTML = '';
            document.querySelector(`afterModal${id}`).classList.toggle("hidden")
        }
    });
}
function cancelModal(id){
    let modal = document.querySelector(`.cancelModal${id}`)
    let createForm = document.querySelector(`.cancel_wrapper${id}`)
    console.log(modal)
    console.log(modal, id);
    createForm.innerHTML= `
        <div class="px-14 w-full flex justify-end">
            <img src="{{asset('img/admin/Close.svg')}}" onclick="cancelModal(${id})" class="w-10 h-auto cursor-pointer">
        </div>
        <form enctype="multipart/formdata" class="cancelForm w-[50%] flex flex-col items-center gap-10">
            <textarea name="push" class="border outline-none px-4 border-[#D5D6D8] w-full bg-[#F0F2F5] placeholder:text-[#7B7B7B]" rows="" cols="" placeholder="Введите причину отказа"></textarea>
            <button type="button" onclick="cancelRequest(${id})" class="bg-[#0D3C99] w-full h-[60px] rounded-md text-white">Отправить</button>
        </form>
    `
    modal.classList.toggle("hidden")
}
function afterModal(id){
    let modal = document.querySelector(`.afterModal${id}`)
    let createForm = document.querySelector(`.after_wrapper${id}`)
    console.log(modal, id);
    createForm.innerHTML= `
        <div onclick="afterModal(${id})" class="w-full cursor-pointer px-14  flex justify-end">Закрыть</div>
        <form enctype="multipart/formdata" class="afterForm flex flex-col items-center gap-10">
            <input name="afterImage" type="file">
            <button type="button" onclick="doneRequest(${id})" class="bg-[#0D3C99] w-[200px] h-[60px] rounded-md text-white">Отправить</button>
        </form>
    `
    console.log(modal)
    modal.classList.toggle("hidden")
}
async function getRequests(){
    let getRequests = await fetch("{{route('getRequest')}}")
    let requests = await getRequests.json();
    requests = requests.requests
    let div = document.getElementById("request-content")
    requests.forEach(request => {
        if (request.status == "Решено" || request.status == "Отклонено" ) {
            div.innerHTML += `
        <tr class="text-center border-b h-[60px] border-[#C2C2C2]">
                <td >${request.id}</td>
                <td >${request.author}</td>
                <td >${request.category}</td>
                <td class="underline underline-black cursor-pointer" onclick="moreModal(${request.id})">${request.title}</td>
                <td>${request.status}</td>
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
                    <div class="text-[32px] cursor-pointer duration-200 hover:text-[#0D3C99] flex justify-start" onclick="moreModal(${request.id})">
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
                <td class="underline underline-black cursor-pointer"  onclick="moreModal(${request.id})">${request.title}</td>
                <td id="status">${request.status}</td>
                <td id="cancel-btn"><img onclick="cancelModal(${request.id})" class="close cursor-pointer w-12" src="{{ asset('img/admin/Close.svg') }}" alt=""></td>
                <td id="done-btn"><img src="{{asset('img/index/Done.svg')}}" class="cursor-pointer" onclick="afterModal(${request.id})" alt=""></td>
        </tr>
        <div class="afterModal${request.id}  lop hidden fixed hidden inset-0 m-auto bg-black bg-opacity-60 z-10">
            <div class="flex h-full w-full justify-center items-center">
                <div class="after_wrapper${request.id} bg-white flex flex-col items-center w-[50%] h-[50%] justify-center">
                </div>
            </div>
        </div>
        <div class="cancelModal${request.id}  lop hidden fixed hidden inset-0 m-auto bg-black bg-opacity-60 z-10">
            <div class="flex h-full w-full justify-center items-center">
                <div class="cancel_wrapper${request.id} bg-white flex flex-col items-center w-[50%] h-[50%] justify-around">
                </div>
            </div>
        </div>
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
