@extends('layouts.layout')

@section('title', 'Edit Post')

@section('content')

<style>
    .container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

h1 {
  margin: 20px 0;
  font-size: 36px;
  font-weight: 600;
  color: #333;
}

img {
  max-width: 100%;
  height: auto;
}

.edit-button,
.delete-button,
.add-comment {
  display: inline-block;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  user-select: none;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: all 0.2s ease-in-out;
}

.edit-button {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.edit-button:hover {
  color: #fff;
  background-color: #0069d9;
}
.delete-button {
  color: #fff;
  background-color: #dc3545;
  border-color: #dc3545;
}

.delete-button:hover {
  color: #fff;
  background-color: #c82333;
  border-color: #bd2130;
}

.add-comment {
  background-color: #007bff;
  color: #fff;
  font-size: 16px;
  font-weight: 600;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: all 0.2s ease;
}

.add-comment:hover {
  background-color: #0069d9;
}

.comments {
  margin-bottom: 20px;
}

form {
  margin-bottom: 20px;
}

form .form-group {
  margin-bottom: 20px;
}

form textarea {
  width: 100%;
  font-size: 16px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

</style>


<div class="container post">
  <div class="post-header">
    <h1 class="post-title">{{ $post->title }}</h1>
    @if (Auth::id() == $post->user_id)
    <div class="post-actions">
        <a href="/posts/{{ $post->id }}/edit" class="edit-button">Edit</a>
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
      @foreach ($post->comments as $comment)
        @include('posts.comment')
      @endforeach
    </div>
    <hr>
    @if (Auth::check())
      <h3>Add Comment</h3>
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