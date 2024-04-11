<div class="hamburger w-full hidden fixed inset-0 m-auto bg-white z-10">
    <div class="hamburger_wrapper w-max h-max fixed inset-0 m-auto z-20">
        <div class="max-md:flex w-full h-full max-md:flex-col  gap-[50px]">
            <div class="image w-full flex justify-end">
                <img src="{{asset('img/admin/Close.svg')}}" onclick="hamburger()" alt="">
            </div>
            <a class="text-[#0D3C99] underline-none" href="#requests">Новости</a>
            <a class="text-[#0D3C99] underline-none" href="#contacts">Контакты</a>
            <a class="text-[#0D3C99] underline-none" href="/profile">Заявки</a>
            <button class="bg-[#0D3C99] rounded-md shadow-md text-white w-48 h-14" onclick="location.href='/profile'">Войти</button>
        </div>


    </div>
</div>


