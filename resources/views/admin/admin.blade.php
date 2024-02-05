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
        <div class="users w-full tabcontent" id="users">
            <h2>Юзеры</h2>
            <input type="text" name="" id="">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Логин</th>
                    <th>Кол-во заявок</th>
                    <th>Принятые заявки</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>4</td>
                        <td>3</td>
                        <td>5</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="admins w-full tabcontent" id="admins">
t
        </div>
    </div>
    <script>
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
