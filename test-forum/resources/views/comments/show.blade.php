{{ $comments->render() }}

@foreach ($comments as $comment)  
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            {{ $comment->user->name }}
                            @if (!empty($comment->user->avatar))
                                <br>
                                <img src="{{ $comment->user->avatar }}">
                            @endif
                        </div>
                        <div class="col-md-10">
                            <div>{{ $comment->body }}</div>
                            <div>
                                <form method="POST" action="/comments/{{ $comment->id }}/favorite">
                                    {{ csrf_field() }}
                                    
                                    <button type="submit" 
                                        @if (auth()->check())
                                            class="btn {{ $comment->isFavorited() ? 'btn-default' : 'btn-primary' }} "
                                        @else 
                                            class="btn btn-default" disabled
                                        @endif
                                    >

                                        {{ $comment->howFavorited->count() }}
                                    </button>
                                </form>
                            </div>
                            @can ('update', $comment)
                                <a href="/thread/{{ $thread->id }}/{{ $comment->id }}/edit">Редактировать комментарий</a>
                                <form action="/thread/{{ $thread->id }}/{{ $comment->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-link">Удалить комментарий</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>      
            </div>  
        </div> 
    </div>
    <br>
@endforeach

{{ $comments->render() }}
