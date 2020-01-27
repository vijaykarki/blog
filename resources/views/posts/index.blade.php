@extends('layouts.app')
@section('content')
@if(count($posts) > 0)
    @foreach ($posts as $post)
    <div class="container-post">
        <div class="post-container">
            <div class="image-container">
            <img src="/storage/cover_images/{{$post->cover_image}}" alt="image">
            </div>
            <div class="post-details">
                <div class="post-title">
                <p><a style="color: black;" href="/posts/{{$post->id}}">{{ $post->title}}</a></p>
                <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                </div>
                <div class="post-desc">
                    <p>{{ $post->description}}</p>                
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    Sorry No post found 
@endif
@endsection
