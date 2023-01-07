<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Document</title>
</head>
<body>

<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>

    


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


    
</body>
</html>