@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>{{ $thread->title }}</h3>
                @can ('update', $thread)
                    <a href="/thread/{{ $thread->id }}/edit">Редактировать тему</a>
                    <form action="/thread/{{ $thread->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-link">Удалить тему</button>
                    </form>
                @endcan
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        {{ $thread->user->name }}
                        @if (!empty($thread->user->avatar))
                            <br>
                            <img src="{{ $thread->user->avatar }}">
                        @endif
                    </div>
                    <div class="col-md-10">
                        {{ $thread->body }}
                        @if ((auth()->check()) and (auth()->id() != $thread->user_id))
                            <div>
                                <form method="POST" action="/thread/{{$thread->id}}/subscribe">
                                    {{ csrf_field() }}
                                    
                                    <button type="submit" class="btn {{ $thread->isSubscribed() ? 'btn-default' : 'btn-primary' }} ">
                                        {{ $thread->isSubscribed() ? 'Отписаться' : 'Подписаться' }}
                                    </button>
                                </form>
                            </div>
                        @endif 
                    </div>
                </div>
            </div>
        </div>
        <br>

        @include('comments.show')

        @include('comments.create')
    </div>
@endsection
