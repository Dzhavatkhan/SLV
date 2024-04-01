<div class="requestForm fixed hidden inset-0 m-auto bg-black bg-opacity-60 z-10">
    <div class="w-max h-max fixed inset-0 m-auto z-20">
        <div class="bg-white shadow-md w-[695px] h-[967px]">
            <div class="modalHeader flex justify-around pt-[22px] items-center">
                <img src="{{asset('img/index/LOGO.svg')}}" alt="" class="logo w-[93px]">
                <div class="title text-[36px] text-[#0D3C99] font-[Ubuntu]">
                    Заявка
                </div>
                <div class="out w-16 flex justify-center" onclick="requestForm()">
                    &times;
                </div>
            </div>
            <div class="modalBody flex w-full justify-center mt-[58px]">
                <form id="reqF" enctype="multipart/form-data" class="reqF flex flex-col items-center gap-[64px] w-[422px]">
                    @csrf
                    <div class="modalInputs flex w-full flex-col items bg-center gap-[53px]">
                        @csrf
                        <input type="text" placeholder="Заголовок" name="title" class="rounded-md outline-none px-4 w-full text-[20px] text-[#7B7B7B] h-[57px] border bg-[#F0F2F5] border-[#D5D6D8]">
                        <textarea name="body" id="" cols="20" placeholder="Описание" rows="10" class="rounded-md outline-none p-4 w-full text-[20px] text-[#7B7B7B border bg-[#F0F2F5] border-[#D5D6D8]"></textarea>
                        <select name="categories_id" id="category" class="rounded-md outline-none px-4 w-full text-[20px] text-[#7B7B7B] h-[57px] border bg-[#F0F2F5] border-[#D5D6D8]" id="">

                        </select>
                        <label class="z-1 flex flex-col justify-center rounded-md outline-none px-4 w-full text-[20px] text-[#7B7B7B] h-[57px] border bg-[#F0F2F5] border-[#D5D6D8]" for="">
                            <input name="photo" class="opacity-0 -z-[0] absolute block w-full" type="file">
                            <span class="z-20">Изображение</span>
                        </label>
                    </div>
                    <button type="submit"  class="btn bg-[#0D3C99] w-full h-10 rounded-md text-white">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>


        $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.reqF').on('submit', function(e){
            e.preventDefault();
            let form = new FormData(document.getElementById("reqF"))
            console.log(form);
            $.ajax({
                type: "POST",
                url: "{{route('createRequest')}}",
                data: form,
                processData: false,
                cache: false,
                contentType:false,
                success: function (response) {
                    console.log(response);
                    getMyRequests();
                }
            });
            })
        })

        // async function createRequest(){

        //     let form = new FormData(document.querySelector(".form"))
        //     let query = await fetch("{{route('createRequest')}}", {
        //         method: "POST",
        //         data: form
        //     })
        //     console.log(query);
        // }
        getCategories();
</script>
