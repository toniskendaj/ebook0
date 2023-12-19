@props(['items'])
<div class="mx-auto pt-20 lg:px-4 lg:pt-32 xl:px-4 px-4 grid grid-rows-8 grid-cols-2 gap-y-3 lg:grid-rows-4 lg:grid-cols-3 xl:grid-rows-3 xl:grid-cols-4 gap-x-1" id="produktet">
@foreach($items as $item)

  <div class="flex flex-col items-center border-5 px-1 lg:w-full md:px-2">
  <a href="{{url('http://127.0.0.1:8000/itemcode/'.$item->id)}}">
    <img src={{ ucfirst($item->image)}} class="w-72 h-80 border-red-300 border-2"></a>
  <div class="text-sm font-bold text-center">{{$item->title}}</div>
  <div class="text-sm text-center">{{$item->author}} </div>
  <div class="text-blue-700 text-md text-center">€ {{$item->price}}</div>
</div>
  @endforeach
</div>
<div class="justify-center flex pt-8">{{$items->links()}}</div>

