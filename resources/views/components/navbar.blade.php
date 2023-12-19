<div class="p-4 sm:p-1 fixed z-50 items-center justify-around space-x-8 w-full flex flex-row bg-gray-500 lg:hidden xl:hidden">
  <div class="flex flex-row space-x-4 sm:space-x-8 pl-2">
  <label for="my-modal-6" class="btn p-0 bg-gray-500 border-0">
    <img src="https://cdn-icons-png.flaticon.com/512/1828/1828859.png" class="fill:white w-8 h-8 sm:w-8 sm:h-8"/></label>
  <div> 
    <label for="my-modal-7" class="btn p-0 bg-gray-500 border-0"> <img src="https://cdn-icons-png.flaticon.com/512/665/665049.png" class="w-8 h-8 sm:w-8 sm:h-8"/></label>
  </div></div>
  <div>
    <img src="https://cdn-icons-png.flaticon.com/512/1945/1945891.png" class="w-48 h-30 sm:w-36 sm:h-16"/></div>
  <div class="flex flex-row space-x-4 sm:space-x-8 pr-2">
  <label for="my-modal-1" class="btn p-0 bg-gray-500 border-0">
    <img src="https://cdn-icons-png.flaticon.com/512/2652/2652234.png" class="w-6 h-6 mt-3 sm:mt-0 sm:w-8 sm:h-8"/></label>
  <div>
  <label for="my-modal-0" class="btn p-0 bg-gray-500 border-0">
    <img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" class=" w-12 h-12 sm:w-8 sm:h-8"/>
  </label>
    </div></div>
 </div>
<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-6" class="modal-toggle" />
<div class="modal h-full modal-bottom sm:modal-middle">
  <div class="modal-box h-full">
    <x-filter/>
    <div class="modal-action justify-end">
      <label for="my-modal-6" class="btn">Get out.</label>
    </div>
  </div>
</div>

<input type="checkbox" id="my-modal-7" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
  <div class="modal-box">
    <h3 class="font-bold text-lg">Projekt per lenden Arkitekture Aplikimi Enterprise!</h3>
    <p class="py-4">Punoi : Elton Hoxhalli || Elton Skëndaj || Ema Rama</p>
    <div class="modal-action">
      <label for="my-modal-7" class="btn">MBYLL</label>
    </div>
  </div>
</div>

<input type="checkbox" id="my-modal-1" class="modal-toggle" />
<label for="my-modal-1" class="modal cursor-pointer">
  <label class="modal-box relative" for="">
  <x-search/>
  </label>
</label>


<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-0" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
  <div class="modal-box">
    <h3 class="font-bold text-lg">Hello @auth<span class="uppercase">{{auth()->user()->name}}@endauth</span>!</h3>
    @auth
    <p class="py-4"><a href="/register" class="text-sm font-bold uppercase underline"> Register a new admin.</a></p>
    <p class="py-4"><a href="/tedhena/read-xml" class="text-sm font-bold uppercase underline"> Put items By XML files.</a></p>
    <p class="py-4"><a href="/create" class="text-sm font-bold uppercase underline"> Add a single item.</a></p>
      <form method="POST" action="/logout">
      @csrf
      <button type="submit" class="btn">Log out.</button>
      </form>
    @else
    <p class="py-4"><a href="/login" class="text-sm font-bold uppercase btn"> Log In.</a></p>
    @endauth
    <div class="modal-action">
      <label for="my-modal-0" class="btn">Dil!</label>
    </div>
  </div>
</div>


