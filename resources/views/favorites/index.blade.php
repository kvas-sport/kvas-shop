@extends('layouts.main')
@section('content')
    <h3>Избранные</h3>
    @foreach($favorites as $favorite)
        <div>
            {{ $favorite->product->name }}
        </div>
    @endforeach
@endsection
