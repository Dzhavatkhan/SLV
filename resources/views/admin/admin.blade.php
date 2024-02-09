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
    <div class="flex">
        <div class="side_bar flex py-10  flex-col items-center justify-between w-[369px] bg-[#526EA5] h-screen">
            <div class="admin_header flex flex-col w-full items-center">
                <img src="{{ asset('img/admin/Male User.svg') }}" alt="" srcset="">
                <div class="admin_panel text-white text-[32px]">Admin Dashboard</div>
            </div>
            <div class="w-full flex justify-center flex-col items-center gap-[35px] text-white text-[24px]">
                <div  class="tab p-2 w-full flex justify-center active  cursor-pointer" onclick="openTab(event, 'requests')" id="defaultOpen">Заявки</div>
                <div  class="tab p-2 w-full flex justify-center  cursor-pointer" onclick="openTab(event, 'users')">Юзеры</div>
                <div class="tab p-2 w-full flex justify-center  cursor-pointer" onclick="openTab(event, 'admins')">Админы</div>
            </div>
            <div class="w-full flex justify-center">
                <img src="{{ asset('img/admin/Logout Rounded Left.svg') }}" alt="">
            </div>
        </div>
        <div class="requests px-[50px] w-full tabcontent" id="requests">

        </div>
        <div class="users w-full tabcontent bg-[#F6F7F8] py-24 pl-[60px] pr-[90px]" id="users">
            <h2 class="text-[32px] text-[#0D3C99]">Юзеры</h2>

            <input type="text" placeholder="Поиск.." class="w-full hover:scale-105 focus:scale-105 outline-none px-[18px] h-16 bg-white shadow-lg rounded-md mt-24" name="" id="">
            <img src="{{ asset('img/admin/Search.svg') }}" class="absolute top-[240px] right-[95px]" alt="" srcset="">
            <table class=" w-full table-auto mt-24">
                <thead class="border-b border-[#C2C2C2]">
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Логин</th>
                    <th>Кол-во заявок</th>
                    <th>Принятые заявки</th>
                </thead>
                <tbody >
                    <tr class="text-center border-b h-[60px] border-[#C2C2C2]">
                        <td >1</td>
                        <td >2</td>
                        <td >4</td>
                        <td >3</td>
                        <td>5</td>
                        <td><img class="close" src="{{ asset('img/admin/Close.svg') }}" alt=""></td>
                        <td><img src="{{ asset("img/admin/Edit.svg") }}" alt=""></td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="admins w-full tabcontent" id="admins">
t
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
    <script>
function close_w() {
    document.querySelector(".modal").classList.toggle("hidden");
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
    document.getElementById(divName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
    </script>
    @vite("resources/js/admin.js")
</body>
</html>
