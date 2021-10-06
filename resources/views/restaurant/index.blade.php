@extends('layouts.app')

@section('content')
    @foreach ($allresturant as $item)
        {{$item->category[0]['name']}}

        
    @endforeach
@endsection