@if ($quantity > 0)
<div class="req_count py-5 px-40 flex flex-col gap-y-2 text-[32px] text-[#526EA5]">
    <div class="count ">Ваши заявки({{$quantity}}):</div>
    <div class="lane h-[1px] bg-[#CFCDCD]"></div>
</div>

<div class="req_container gap-y-10 px-40  py-10 gap-x-16 place-items-center place-content-center max-md:grid-cols-1  max-sm:grid-cols-1  grid grid-cols-3">
    @foreach ($requests as $request)
        <div class="request w-[411px] shadow-lg cursor-pointer pb-2 hover:shadow-xl duration-150 hover:scale-100 ">
            <img title="Нажмите, чтобы увидеть изменения" src="{{asset('img/admin/requests/'.$request->photo)}}" onclick="after({{$request->id}}, '{{$request->photo}}', '{{$request->afterImage}}')" alt="" class="req{{$request->id}} pop max-h-[235px] w-full">
            <div class="mt-[13px] req_title px-5 flex justify-between">
                <p class="text-[24px]">{{$request->title}}</p>
                @if ($request->status == "Рассматривается")
                <img src="{{asset('img/profile/Loading.svg')}}" title="Рассматривается" class="select-none" alt="" srcset="">

                @else
                    <img src="{{asset('img/index/Done.svg')}}" class="select-none" alt="" srcset="">
                @endif
            </div>
            <p class="px-5 text-[20px]">{{$request->body}}</p>
            <p class="px-5 text-[16px] text-[#0D3C99]" >#{{$request->category}}</p>
            <div class="content px-5 pt-3 pb-3 w-full flex justify-between">
                <p class="text-[16px] text-[#96969696]">{{$request->updated_at->format("d.m.Y")}}</p>
                <div class="icons inline-flex gap-2">
                    <img src="{{asset('img/profile/edit.svg')}}" onclick="editRequest({{$request->id}})" class="cursor-pointer w-[25px] " alt="icon" alt="">
                    <img src="{{asset('img/profile/Delete.svg')}}" onclick="deleteRequest({{$request->id}})" class="cursor-pointer w-[25px] " alt="icon" alt="">
                </div>
            </div>
        </div>

    @endforeach
</div>
@else
<div class="message_wrapper w-full h-[500px] flex items-center justify-center">
    <div class="message text-[36px] text-[#526EA5]">Нет заявок</div>
</div>
@endif



<div id="alert" class="w-[350px] bg-white fixed bottom-5 left-5 p-[10px] hidden rounded-md items-start justify-end gap-2">
    <div class="product-info flex">
      <img src="{{asset('img/admin/Male User.svg')}}" alt="Product Image" class="mr-[10px] w-full h-full" id="product-image" />
      <div id="alert-text"></div>
    </div>
    <button class="close-btn bg-transparent text-[#526EA5] ">Close</button>
</div>



@include('components.modal.editProfile')
@include("components.modal.requestForm")
<script>
        function after(id, before, after){
            console.log(id, before, after);
                let afterImage = `{{asset('img/admin/after/${after}')}}`
                let beforeImage = `{{asset('img/admin/requests/${before}')}}`
                let image = document.querySelector(`.req${id}`)
                if (image.src == afterImage) {
                    image.src = beforeImage
                }
                else{
                    image.src = afterImage                    
                }

                console.log(image);
        }   
        </script>