@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Создать новую тему</h2>
                <hr>
                <form method="POST" action="/thread">
                	{{ csrf_field() }}

                	<div class="form-group">
                		<label for="title">Тема: </label>
                		<input type="text" name="title" class="form-control" required>
                	</div>

                	<div class="form-group">
                		<label for="body">Описание: </label>
                		<textarea name="body" class="form-control" rows="8" required></textarea>
                	</div>

                	<div class="form-group">
                		<button type="submit" class="btn btn-primary">Опубликовать</button>
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
