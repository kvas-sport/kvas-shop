@extends('layouts.main')
@section('content')
    <section>
        <h1>Подтвердите e-mail</h1>
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            @method('POST')
            <p>Потеряли письмо? - <button type="submit">отправить снова</button></p>
        </form>
    </section>
@endsection
