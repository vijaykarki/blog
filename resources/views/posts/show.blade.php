@extends('layouts.app')
@section('content')
    <div class="post-description">
        <p class="title">{{ $post->title}}</p>
        <div class="post-image">
            <img src="/storage/cover_images/{{$post->cover_image}}" alt="image">
        </div>
        <div class="details">
            <p>{{ $post->description}}</p>
        </div>
    </div>
@endsection
