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

.author-tag {
  margin: 0;
  font-size: 20px;
  font-weight: 600;
  color: #333;
  margin-left: 10px;
}
.author-tag, .view-count {
  display: inline-block;
  margin-right: 20px;
  font-size: 18px;
  font-weight: 600;
  color: #333;
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
    <div>
    <span class="author-tag">By: <a href="/profiles/{{ $post->user->id }}">{{ $post->user->name }}</a></span>    
    <p class="view-count">Views: {{ $post->view_count }}</p>
  </div>
  @if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->can('edit-posts')))    <div class="post-actions">
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
    <img src="/images/{{ $post->image }}" alt="This is post Image" class="post-image">
    <p class="post-content">{{ $post->body }}</p>
  </div>
  <hr>
  <div class="comments-section">
  <h3 class="comments-title">Comments</h3>
  <div class="comments">
      @if ($post->comments->count())
      @foreach ($post->comments->sortByDesc('created_at') as $comment)              
      @include('posts.comment')
          @endforeach
      @else
          <p>This post has no comments.</p>
      @endif
  </div>
  <hr>
  @if (Auth::check())
    <h3 class="comments-title">Add Comment</h3>
    <form method="POST" action="/posts/{{ $post->id }}/comments" id="add-comment-form">
      @csrf
      <div class="form-group">
        <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
      </div>
      <button type="submit" class="add-comment">Add Comment</button>
    </form>
  @endif
</div>

<!-- Include the jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    $('#add-comment-form').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
        type: 'POST',
        url: '/posts/{{ $post->id }}/comments',
        data: $(this).serialize(),
        success: function(response) {

          $('#body').val('');
          location.reload();

        }
      });
    });
  });
</script>

@endsection