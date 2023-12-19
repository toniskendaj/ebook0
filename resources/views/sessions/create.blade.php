@extends('layout.app')
@section('content')
<div class="pt-24">
<section class="px-6 py-8">
<main class="max-w-lg mx-auto mt-10 bg-gray-100 p-4 border border-black rounded-xl border-1">
    <h1 class="text-center font-bold text-2xl">Log in.</h1>
<form method="POST" action="/login" class="mt-10">
    @csrf
    <div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm text-pink-700" for="username">Username</label>
    <input class="border border-black pt-2 w-full" type="text" name="username" id="username" required/>
    @error('username')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm text-pink-700" for="password">Password</label>
    <input class="border border-black pt-2 w-full" type="password" name="password" id="password" required/>
    @error('password')<p class="text-red-500 text-sm mt-1">{{$message}}</p>@enderror
</div>
<div class="mb-6">
  <button type="submit" class="bg-black text-white rounded py-2 px-4 hover:bg-green-400">Log in</button>
</div>
</form>
</main>
</section>
</div>
@endsection