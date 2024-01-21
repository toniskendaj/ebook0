@extends('layout.app')
@section('content')

<div class="container flex flex-col items-center pb-4 pt-24 lg:flex lg:flex-row lg:px-10 lg:pt-36 lg:w-full lg:space-x-16 xl:pt-48 xl:px-20">
@foreach($itemsearched as $i)
<img src={{ ucfirst($i->image)}} class="w-72 h-80 md:h-[30rem] md:w-[28rem] border-blue-300 border-2">
<div class="container flex flex-col justify-center w-full">
<div class="text-center pb-4">
               <p class="text-2xl font-semibold">{{$i->title}}</p>
               <p class="font-light text-xl">{{$i->description}}</p>
               <p class="font-light text-4xl text-green-600 pt-5">€ {{$i->price}}</p>
</div>
<hr>
<div class="text-center pt-4 pb-6">
               <p class="text-normal font-bold"> About the book:</p>
               <p class="text-xl font-light">Author: {{$i->author}}</p>
               <p class="text-xl font-light">Number of pages: {{$i->pages}}</p>
               <p class="text-xl font-light">Year Published: {{$i->year}}</p>
               <p class="text-xl font-light">Returnable : {{ucfirst($i->returnable)}}</p>
               <p class="text-xl font-light">Language :{{ucfirst($i->language)}}</p>
</div>
@if($i->quantity <= 34 && $i->quantity > 0)
<div class="items-center border border-red-600 text-center w-11/12 md:w-4/12 lg:w-7/12 mx-auto">
<p class="text-red-500 text-bold underline underline-offset-2 ">
    There are only {{$i->quantity}} books left.
</p>
</div>
@endif
@if($i->quantity == 0)
<div class="items-center border border-red-600 text-center w-11/12 md:w-4/12 lg:w-7/12 mx-auto">
<p class="text-red-800 text-bold underline underline-offset-2">
    This book is not available to be purchased.
</p>
</div>
@endif

<div class="flex justify-center flex-col items-center pt-3">
@auth
<form id="delete-frm" class="pb-2" action="" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger">Delete Post</button>
</form>
@endauth
@if($i->quantity > 0)
<php> $itemf = $i->ISBN </php>
                <button class="bg-white hover:bg-blue-700 text-blue-700 border border-blue-700 hover:text-white font-bold py-2 px-4 rounded-full w-11/12 md:w-7/12 lg:w-10/12" onclick="addToCart($temf)">
                    Buy Now.
                </button>
                @else
                <button class="bg-grey-200 hover:bg-grey-700 text-red-400 border border-black hover:text-black font-bold py-2 px-4 rounded-full  w-11/12 md:w-7/12 lg:w-8/12" disabled>
                    Not available.
                </button>
                @endif
</div>
</div>
</div>
@endforeach
</div>
@endsection