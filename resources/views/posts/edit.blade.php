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

form {
  max-width: 500px;
  margin: 0 auto;
}

label {
  display: block;
  font-size: 26px;
  font-weight: 600;
  color: #666;
  margin-bottom: 5px;
}

input,
textarea {
  width: 100%;
  font-size: 16px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

textarea {
  height: 200px;
}
.form-group{
    padding: 10px;
}
.create-button {
  display: block;
  width: 100%;
  background-color: #007bff;
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.create-button:hover {
  background-color: #0069d9;
}

</style>


<div class="container">
    <h1>Edit Post</h1>
    <form method="POST" enctype="multipart/form-data" action="/posts/{{ $post->id }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required />
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="3" required>{{ $post->body }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" required />
        </div>

        <div class="form-group">
    <button type="submit" class="create-button">Update Post</button>
</div>
@endsection

