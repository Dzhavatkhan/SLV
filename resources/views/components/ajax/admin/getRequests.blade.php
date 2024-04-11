@foreach ($requests as $request)
<tr class="text-center border-b h-[60px] border-[#C2C2C2]">
    <td >{{$request->id}}</td>
    <td >{{$request->author}}</td>
    <td >{{$request->category}}</td>
    <td onclick="moreModal({{$request->id}})">{{$request->title}}</td>
    <td>{{$request->status}}</td>
    <td><img onclick="deleteRequest({{$request->id}})" class="close cursor-pointer w-12" src="{{ asset('img/admin/Close.svg') }}" alt=""></td>
    <td><img src="{{asset('img/index/Done.svg')}}" class="cursor-pointer" onclick="doneRequestModal({{$request->id}})" alt=""></td>

    <div class="doneRequestModal{{$request->id}} fixed hidden inset-0 m-auto bg-black bg-opacity-60 z-10">
        <div class="w-max h-max fixed inset-0 m-auto z-20">
            <div class="bg-white shadow-md w-[695px] h-[967px] flex flex-col justify-center items-center gap-[50px]">
                <div class=" flex gap-12 justify-center">
                    <img src='{{asset("img/admin/requests/$request->photo")}}' class="w-1/2">
                </div>
                <div class="flex w-1/2 flex-col items-start gap-[10px]">
                    <div class="title bold">{{$request->title}}</div>
                    <div class="body">{{$request->body}}</div>
                </div>
                <div class="text-[32px] flex justify-start" onclick="doneRequestModal({{$request->id}})">
                    Закрыть
                </div>
            </div>
        </div>
    </div>

    <div class="requestMore{{$request->id}} fixed hidden inset-0 m-auto bg-black bg-opacity-60 z-10">
        <div class="w-max h-max fixed inset-0 m-auto z-20">
            <div class="bg-white shadow-md w-[695px] h-[967px] flex flex-col justify-center items-center gap-[50px]">
                <div class=" flex gap-12 justify-center">
                    <img src='{{asset("img/admin/requests/$request->photo")}}' class="w-1/2">
                </div>
                <div class="flex w-1/2 flex-col items-start gap-[10px]">
                    <div class="title bold">{{$request->title}}</div>
                    <div class="body">{{$request->body}}</div>
                </div>
                <div class="text-[32px] flex justify-start" onclick="moreModal({{$request->id}})">
                    Закрыть
                </div>
            </div>
        </div>
    </div>
    <div class="doneRequestModal{{$request->id}} lolo fixed hidden inset-0 m-auto bg-black bg-opacity-60 z-10">
        <div class="w-max h-max fixed inset-0 m-auto z-20">
            <div class="bg-white shadow-md w-[695px] h-[500px] flex flex-col items-center gap-[50px]">
                <form action="api/doneRequest/id{{$request->id}}">
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
                        <button class="bg-[#0D3C99] text-white" onclick="doneRequest({{$request->id}})">Оправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</tr>

@endforeach

<script>

</script>
