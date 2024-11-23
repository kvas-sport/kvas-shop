@extends('layouts.main')
@section('content')
    <h3>Избранные</h3>
    @foreach($favorites as $favorite)
        {{ $favorite->product->name }}
    @endforeach
@endsection
