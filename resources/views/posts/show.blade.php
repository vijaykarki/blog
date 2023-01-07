@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <img src="{{ asset('/storage/app/'.$post->image) }}" alt="This is post Image">
    <!-- <img src="~/blog/storage/app/public/GToWZMb9g4dHoyc3luKNVLDvXj9AWiJe2m3Z7HGM.jpg" alt="Featured Image"> -->

    @if (Auth::id() == $post->user_id)
    <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
                            <form action="/posts/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                    @endif
    
    <hr>
    <h3>Comments</h3>
    <div class="comments">
        @foreach ($post->comments as $comment)
            @include('posts.comment')
        @endforeach
    </div>
    <hr>
    @if (Auth::check())
        <h3>Add Comment</h3>
        <!-- <form> -->
        <form method="POST" action="/posts/{{ $post->id }}/comments">
            @csrf
            <div class="form-group">
                <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
    @endif
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