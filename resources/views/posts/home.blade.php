@extends('layouts.layout')

@section('title', 'Home')

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

a {
  font-size: 16px;
  color: #007bff;
  text-decoration: none;
  transition: all 0.2s ease;
}

a:hover {
  color: #0056b3;
}

.card {
  background-color: #fff;
  box-shadow: 0 2px 3px rgba(0,0,0,0.3);
  border-radius: 6px;
  overflow: hidden;
}

.card-body {
  padding: 20px;
}

.card-title {
  margin: 0;
  font-size: 20px;
  font-weight: 600;
  color: #333;
}

.card-text {
  margin: 20px 0 10px;
  font-size: 16px;
  line-height: 1.5;
  color: #666;
}

.card-image {
  flex: 1;
  max-width: 100%;
  height: auto;
  margin-right: 20px;
}

.view-button {
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

.view-button {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.view-button:hover {
  color: #fff;
  background-color: #0069d9;
  border-color: #0062cc;
}

.card {
  margin-bottom: 30px;
}
.pagination {
display: flex;
justify-content: center;
}

.pagination .page-item {
display: flex;
align-items: center;
padding: 10px;
border: 1px solid #ddd;
cursor: pointer;
}

.pagination .page-item:not(:first-child) {
margin-left: 10px;
}

.pagination .page-item.active {
background-color: #007bff;
color: #fff;
}

.pagination .page-item:hover {
background-color: #f2f2f2;
}

</style>

<div class="container">
  <h1>All Posts</h1>
  @foreach ($posts as $post)
    <div class="card">
    <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <div class="card-text">
    <img src="{{ asset('/storage/app/'.$post->image) }}" alt="This is post Image" class="card-image">
    <p class="post-snippet">{{ substr($post->body, 0, 50) }}...</p>
    </div>
    <a href="/posts/{{ $post->id }}" class="view-button">View</a>
    </div>
    </div>
  @endforeach
  <div class="pagination">
      {{$posts->links()}}
</div>
</div>
@endsection