
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <hr>
    <h3>Comments</h3>
    @foreach ($post->comments as $comment)
        @include('posts.comment')
    @endforeach
    <hr>
    @if (Auth::check())
        <h3>Add Comment</h3>
        <form method="POST" action="/posts/{{ $post->id }}/comments">
            @csrf
            <div class="form-group">
                <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
    @endif
</div>
