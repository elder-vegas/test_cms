@if (auth()->check())
    <form method="POST" action="/thread/{{ $thread->id }}/comments">
        {{ csrf_field() }}
        
        <div class="form-gruop">
            <textarea name="body" class="form-control" rows="6"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Написать</button>
    </form>
@endif
