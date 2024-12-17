
@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Уведомления</h1>
    @if($notifications->isEmpty())
        <p>Нет новых уведомлений.</p>
    @else
        <ul class="notification-list">
            @foreach($notifications as $notification)
                <li class="notification-item">
                    <span class="notification-message">{{ $notification->message }}</span>
                    <span class="notification-date">{{ $notification->created_at }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection