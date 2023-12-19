@extends('layout.app')
@section('content')
<!-- Navigation -->
{{View::make('components/showitems')->with('items',$items)}}
@endsection