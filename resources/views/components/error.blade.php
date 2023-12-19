@extends('layout.app')
@section('content')

<div class="container pt-32 mx-auto flex flex-col items-center justify-center pb-10">
<div class="text-5xl text-red-700 pt-4">You are not supposed to be here:</div>
<div class="pt-10 pb-4">Turn back.</div>
  <a href="/"><button class="bg-blue-500 text-white font-bold py-2 px-4 rounded-full">
  Go Home.
</button></a>
</div>
@endsection