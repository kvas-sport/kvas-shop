@extends('layouts.main')
@section('content')
    <section>
        <h2>Заказы</h2>
        @foreach($orders as $order)
            <h2>{{ $order->user_id }}</h2>
        @endforeach
    </section>
@endsection
