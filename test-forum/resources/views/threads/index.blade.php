@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($threads as $thread)
                <div class="card">
                    <div class="card-header">
                        <h3><a href="/thread/{{ $thread->id }}">{{ $thread->title }}</a></h3> <br>
                        <span class='author'>Автор: {{ $thread->user->name }}</span>
                    </div>
                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
                <br>
                @endforeach
            </div> 
        </div> 
    </div>
@endsection
