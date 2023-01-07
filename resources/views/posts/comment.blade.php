
<div class="card mb-3">
    <div class="card-body">
        {{ $comment->body }}
    </div>
    <div class="card-footer">
            <small>Written on {{$comment->created_at}} by {{$comment->user->name}}</small>
    </div>
</div> 
