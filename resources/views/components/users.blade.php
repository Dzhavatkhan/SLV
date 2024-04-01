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
