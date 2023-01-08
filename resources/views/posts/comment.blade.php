<style>
.comment-body {
  margin: 0 auto;
  padding:5px;

}

.card-body {
  background-color: #f8f9fa;
  padding: 10px 20px;
  border-radius: 5px;
  font-size:20px;
}

.card-footer {
  background-color: #f8f9fa;
  padding: 10px 20px;
  border-radius: 0 0 5px 5px;
  font-size:16px;
}
.delete-comment {
  text-align: right;
}

.delete-button {
  background-color: #dc3545;
  border-color: #dc3545;
  color: #fff;
  font-size:16px;

}

</style>
<div class="comment-body">
    <div class="card-body">
        {{ $comment->body }}
    </div>
    <div class="card-footer">
      <small>Written on {{$comment->created_at}} by {{$comment->user->name}}</small>
      @can('delete', $comment)
        <form action="/comments/{{ $comment->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Delete</button>
        </form>
      @endcan


    </div>
</div> 
