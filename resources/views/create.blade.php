
@extends('layout.app')
@section('content')
@auth
<div class="flex justify-center items-center pt-24">
<section class="px-6 pb-8 w-10/12">
<main class="max-w-lg mx-auto mt-10 bg-gray-100 p-4 border border-black rounded-xl border-1">
    <h1 class="text-center font-bold text-2xl">Register a new Book.</h1>
<form method="POST" action="/create" class="mt-10">
    @csrf
    <div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="ISBN">ISBN</label>
    <input class="border border-black pt-2 w-full" type="number" name="ISBN" id="ISBN" required/>
    @error('ISBN')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="id">ID</label>
    <input class="border border-black pt-2 w-full" type="number" name="id" id="id" required/>
    @error('id')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="title">Title</label>
    <input class="border border-black pt-2 w-full" type="title" name="title" id="title" required/>
    @error('title')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm " for="link">Link</label>
    <input class="border border-black pt-2 w-full" type="text" name="link" id="link" required/>
    @error('link')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
    <div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm " for="image">Image</label>
    <input class="border border-black pt-2 w-full" type="text" name="image" id="image" required/>
    @error('image')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="price">Price</label>
    <input class="border border-black pt-2 w-full" type="number" name="price" id="price" required/>
    @error('price')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="description">Description</label>
    <input class="border border-black pt-2 w-full" type="text" name="description" id="description" required/>
    @error('description')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="pages">Pages</label>
    <input class="border border-black pt-2 w-full" type="number" name="pages" id="pages" required/>
    @error('pages')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="availability">Availability</label>
    <input class="border border-black pt-2 w-full" type="text" name="availability" id="availability" required/>
    @error('availability')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="quantity">Quantity</label>
    <input class="border border-black pt-2 w-full" type="number" name="quantity" id="quantity" required/>
    @error('quantity')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="returnable">Returnable</label>
    <input class="border border-black pt-2 w-full" type="text" name="returnable" id="returnable" required/>
    @error('returnable')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="year">Year</label>
    <input class="border border-black pt-2 w-full" type="number" name="year" id="year" required/>
    @error('year')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="author">Author</label>
    <input class="border border-black pt-2 w-full" type="text" name="author" id="author" required/>
    @error('author')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="language">Language</label>
    <input class="border border-black pt-2 w-full" type="text" name="language" id="language" required/>
    @error('language')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm" for="type">Type</label>
    <input class="border border-black pt-2 w-full" type="text" name="type" id="type" required/>
    @error('type')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6 flex justify-center">
  <button type="submit" class="bg-black text-white rounded py-2 px-4 hover:bg-green-400">Submit</button>
</div>
</form>
</main>
</section>
</div>
@else
<x-error/>
@endauth
@endsection