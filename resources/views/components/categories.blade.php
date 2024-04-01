<div class="categories w-full tabcontent bg-[#F6F7F8] py-24 pl-[60px] pr-[90px]" id="categories">
    <h2 class="text-[32px] text-[#0D3C99]">Категории</h2>

    <div class="admin-instruments flex justify-between  w-full  h-16  mt-24">
        <div class="search w-[1000px] duration-200 hover:scale-105 focus:scale-105 flex">
            <input type="text" placeholder="Поиск.." class="w-full z-10   outline-none px-[18px] h-16 bg-white shadow-lg rounded-md " name="" id="">
            <img src="{{ asset('img/admin/Search.svg') }}" class="relative right-14 z-20" alt="" srcset="">
        </div>
        <button onclick="createCategoryModal()" class="createNewCaregory hover:scale-105 shadow-sm rounded-md text-white text-[20x] duration-200 hover:shadow-lg h-16 w-44 bg-[#0D3C99] ">
            Создать
        </button>
    </div>


    <table class=" w-full table-auto mt-24">
        <thead class="border-b border-[#C2C2C2]">
            <th>ID</th>
            <th>Имя</th>
            <th>Дата</th>
        </thead>
        <tbody id="outputCategory">



        </tbody>
    </table>
</div>
<script>

        function deleteCategory(id){
            let categoryId = id
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $.ajax({
                type: "DELETE",
                url: `/api/deleteCategory/id${id}`,
                data: {id: id},
                success: function (response) {
                    getCategory();
                }
            });

        }
</script>
