@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                	<div class="card-header">
                		<h2>{{ $user->name }}</h2>
                	</div>
                	<div class="card-body">
                		@if (!empty($user->avatar))
                			<img src="{{ $user->avatar }}">
                			<br><br>
                        @endif

                        <form method="POST" action="/profile" enctype="multipart/form-data">
                        	{{ csrf_field() }}

                        	<div class="form-group">
                        		<label for="avatar" class="control-label">Максимальный размер - 150x150 </label>
                        		<input type="file" name="avatar" required>                   		
                        	</div>
                        	<div class="form-group">
                        		<button type="submit" class="btn btn-primary">
                                    Изменить аватар
                                </button>
                            </div>
                        </form>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <p><a href="/profile/password/change">Изменить пароль</a></p>

                        <hr>

                		<p>Ваши темы</p>
                		@foreach ($user->threads->sortBy('created_at') as $thread)
    		                <div class="card">
    		                    <div class="card-header">
    		                        <h3><a href="/thread/{{ $thread->id }}">{{ $thread->title }}</a></h3> <br>
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
        </div> 
    </div>
@endsection
