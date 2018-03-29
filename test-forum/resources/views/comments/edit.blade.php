@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Редактирование комментария в теме "{{ $thread->title }}"</h2>
                <hr>
                <form method="POST" action="/thread/{{ $thread->id }}/{{$comment->id}}">
                	{{ csrf_field() }}
                    {{ method_field('PATCH') }}

                	<div class="form-group">
                		<label for="body">Текст комментария: </label>
                		<textarea name="body" class="form-control" rows="6" required>{{ $comment->body }}</textarea>
                	</div>

                	<div class="form-group">
                		<button type="submit" class="btn btn-primary">Сохранить</button>
                	</div>

                	@if (count($errors))
                		<ul class="alert alert-danger">
                			@foreach ($errors->all() as $error)
                				<li>{{ $error }}</li>
                			@endforeach
                		</ul>
                	@endif
                </form>
            </div> 
        </div> 
    </div>
@endsection
