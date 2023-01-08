@extends('layouts.layout')

@section('title', 'Edit Post')

@section('content')

<style>
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 10px 20px;
  display: flex;
  flex-direction: column;
}

.post-header {
  display: flex;
  align-items: flex-end;
  margin-bottom: 20px;
}

.post-title {
  margin: 0;
  font-size: 36px;
  font-weight: 600;
  color: #333;
  flex: 1;
}

.post-actions {
  display: flex;
  align-items: center;
}
.add-comment, .edit-button, .delete-button {
  display: block;
  background-color: #007bff;
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.edit-button {
  background-color: #0077cc;
  margin-right: 10px;
}
.edit-button a{
  background-color: #0077cc;
  margin-right: 10px;
  text-decoration: none;
  color: white;
  padding: 8px 16px;

}
.delete-button {
  background-color: #0069d9;
  margin-right: 10px;
}
.delete-button:hover {
  background-color: #dc3545;
}
.post-body {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.post-image {
  max-width: 100%;
  height: auto;
  margin-right: 20px;
}

.post-content {
  flex: 1;
  font-size: 18px;
  line-height: 1.5;
  color: #555;
}

.comments-section {
  margin-bottom: 20px;
}

.comments-title {
  margin: 0;
  font-size: 30px;
  font-weight: 600;
  color: #333;
  margin-bottom: 20px;
}

input,
textarea {
  width: 50%;
  font-size: 16px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
  height: 20px;

}

</style>


<div class="container">
  <div class="post-header">
    <h1 class="post-title">{{ $post->title }}</h1>
    @if (Auth::id() == $post->user_id)
    <div class="post-actions">
        <button class="edit-button">  <a href="/posts/{{ $post->id }}/edit" class="edit-button-a">Edit</a></button>
        <form action="/posts/{{ $post->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="delete-button">Delete</button>
        </form>
      </div>
    @endif
  </div>
  <div class="post-body">
    <img src="{{ asset('/storage/app/'.$post->image) }}" alt="This is post Image" class="post-image">
    <p class="post-content">{{ $post->body }}</p>
  </div>
  <hr>
  <div class="comments-section">
    <h3 class="comments-title">Comments</h3>
    <div class="comments">
        @if ($post->comments->count())
            @foreach ($post->comments as $comment)
                @include('posts.comment')
            @endforeach
        @else
            <p>This post has no comments.</p>
        @endif
    </div>
    <hr>
    @if (Auth::check())
      <h3 class="comments-title">Add Comment</h3>
      <form method="POST" action="/posts/{{ $post->id }}/comments">
        @csrf
        <div class="form-group">
          <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
        </div>
        <button type="submit" class="add-comment">Add Comment</button>
      </form>
    @endif
  </div>
</div>


<!-- 
<script>
$(document).ready(function() {
    $('form').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: '/posts/{{ $post->id }}/comments',
            method: 'POST',
            data: {
                body: $('#body').val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert("comment added")
                $('#body').val('');
                $('.comments').append(response);
            }
        });
    });
});
</script> -->
@endsection