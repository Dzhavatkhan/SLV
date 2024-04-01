<div class="createCategory modal hidden absolute inset-0 m-auto bg-black bg-opacity-60 z-50">
    <div class="modal_wrapper w-screen h-screen flex justify-center items-center">
        <div class="bg-white py-10 w-[695px] h-[987px] shadow-lg flex flex-col ">
            <div class="header_modal flex justify-around items-center">
                <img src="{{asset('img/index/LOGO.svg')}}" alt="">
                <h2>Новая категория</h2>
                <img onclick="createCategoryModal()" class="cursor-pointer hover:rotate-180 duration-200" src="{{asset('img/admin/Close.svg')}}" alt="">
            </div>
            <div class="formBlo h-full flex justify-center items-center">
                <form class="createCategroyForm w-[422px] flex flex-col gap-20 items-center">
                    @csrf
                    <input type="text" id="text" name="name" class="w-full px-4 text-[20px] h-[57px] placeholder:text-[#7B7B7B] bg-[#F0F2F5] border outline-none border-[#D5D6D8]" placeholder="Название">
                    <button class="bg-[#526EA5] text-[24px] text-white w-full h-[57px] rounded-md duration-200 active:bg-[#0C0F99] hover:bg-[#0D3C99]">Создать</button>
                </form>
            </div>

        </div>
    </div>
</div>
