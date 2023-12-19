<div>
<div class="grid grid-cols-1">
<button onclick="openAuthor()">Choose one or more Authors.</button>
<button onclick="openYear()">Choose one or more Years.</button>
<button onclick="openLanguage()">Choose one or more Languages.</button>
<button onclick="openType()">Choose one or more Types.</button>
</div>
<form method="GET" role="form" action="/">
@csrf
<div class="pt-4 items-center flex justify-center">
<div id="author" hidden>
    @foreach($author as $a)
    @php
    $author_pm=[];
    if(isset($_GET['ath']))
    $author_pm=$_GET['ath'];
    @endphp
    @if(isset($a->author))
    <div><input type="checkbox" name="ath[]" value="{{$a->author}}" class="inline-block mr-2"
@if(in_array($a->author,$author_pm)) checked @endif/>{{$a->author}}</div>@endif
    @endforeach
</div></div>
<div class="items-center flex justify-center">
<div id="year" hidden >
    @foreach($year as $a)
    @php
    $year_pm=[];
    if(isset($_GET['yr']))
    $year_pm=$_GET['yr'];
    @endphp
    @if(isset($a->year))
    <div class="flex flex-col-2 "><input type="checkbox" name="yr[]" value="{{$a->year}}" class="inline-block mr-2"
@if(in_array($a->year,$year_pm)) checked @endif/>{{$a->year}}</div>@endif
    @endforeach
</div></div>
<div class="items-center flex justify-center">
<div id="language" hidden>
    @foreach($language as $a)
    @php
    $language_pm=[];
    if(isset($_GET['lng']))
    $language_pm=$_GET['lng'];
    @endphp
    @if(isset($a->language))
    <div>
        <input type="checkbox" name="lng[]" value="{{$a->language}}" class="inline-block mr-2"
@if(in_array($a->language,$language_pm)) checked @endif/>{{$a->language}}</div>@endif
    @endforeach
</div></div>
<div class="items-center flex justify-center">
<div id="type" hidden>
    @foreach($type as $a)
    @php
    $type_pm=[];
    if(isset($_GET['tp']))
    $type_pm=$_GET['tp'];
    @endphp
    @if(isset($a->type))
    <div>
        <input type="checkbox" name="tp[]" value="{{$a->type}}" class="inline-block mr-2"
@if(in_array($a->tpye,$type_pm)) checked @endif/>{{$a->type}}</div>@endif
    @endforeach
</div></div>
<div class="pt-4 flex flex-row-reverse">
<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-full">
  Submit
</button></div>
</form>
</div>
<script>
function openAuthor() {
    var x = document.getElementById("author");
    if (x.style.display === "none") {
        x.style.display = "block";
        $("#year").hide();
        $("#language").hide();
        $("#type").hide();
    } else {
        x.style.display = "none";
    }
}
function openYear() {
    var x = document.getElementById("year");
    if (x.style.display === "none") {
        x.style.display = "block";
        $("#author").hide();
        $("#language").hide();
        $("#type").hide();
    } else {
        x.style.display = "none";
    }
}
function openLanguage() {
    var x = document.getElementById("language");
    if (x.style.display === "none") {
        x.style.display = "block";
        $("#author").hide();
        $("#year").hide();
        $("#type").hide();
    } else {
        x.style.display = "none";
    }
}
function openType() {
    var x = document.getElementById("type");
    if (x.style.display === "none") {
        x.style.display = "block";
        $("#author").hide();
        $("#language").hide();
        $("#year").hide();
    } else {
        x.style.display = "none";
    }
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>