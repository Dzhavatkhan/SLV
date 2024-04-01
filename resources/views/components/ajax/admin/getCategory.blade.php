@foreach ($categories as $category)
<tr class="text-center border-b h-[60px] border-[#C2C2C2]">
    <td >{{$category->id}}</td>
    <td >{{$category->name}}</td>
    <td >{{$category->created_at->format("d.m.Y")}}</td>
    <td><img onclick="deleteCategory({{$category->id}})" class="close" src="{{ asset('img/admin/Close.svg') }}" alt=""></td>
    <td><img src="{{ asset("img/admin/Edit.svg") }}" alt=""></td>
</tr>
@endforeach
