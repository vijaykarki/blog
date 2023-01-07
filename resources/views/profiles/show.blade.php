@extends('layouts.layout')

@section('content')
<style>
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.card {
  background-color: #fff;
  box-shadow: 0 2px 3px rgba(0,0,0,0.1);
  border-radius: 6px;
  overflow: hidden;
}

.card-header {
  background-color: #f7f7f7;
  font-size: 30px;
  font-weight: 800;
  color: #444;
  padding: 20px;
}
.card-header a{
  background-color: #f7f7f7;
  text-decoration: none;
  font-size: 30px;
  font-weight: 800;
  color: #444;
  padding: 20px;
}
.card-body {
  padding: 20px;
}

.card-body p {  
  margin: 10px;
  font-size: 26px;
  line-height: 1.5;
  color: #666;
}

.card-body h3 {
  margin: 20px 0 10px;
  font-size: 36px;
  font-weight: 600;
  color: #333;
}

.card-body ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

.card-body ul li {
  margin: 10px 10;
  font-size: 20px;
  color: #888;
  padding:10px;
}

.card-body ul li a {
  color: #888;
  text-decoration: none;
  transition: all 0.2s ease;
}

.card-body ul li a:hover {
  color: #333;
}

</style>
<div class="container">

      <div class="card">
        <div class="card-header">
          Profile
          <a href="{{ route('profiles.edit', $profile) }}" class="btn btn-primary float-right">Edit Profile</a>
        </div>
        <div class="card-body">
          <p>Name: {{ Auth::user()->name }}</p>
          <p>Email: {{ Auth::user()->email }}</p>
          <p>Location: {{ $profile->location }}</p>
          <p>Bio: {{ $profile->bio }}</p>
</div>
<div class="card-header">
<h3>Posts</h3>
</div>
    <div class="card-body">

          @if ($posts->count())
            <ul>
              @foreach ($posts as $post)
                <li><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></li>
              @endforeach
            </ul>
          @else
            <p>This user has no posts.</p>
          @endif

        </div>
      </div>

</div>

@endsection