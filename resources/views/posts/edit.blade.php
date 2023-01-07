
<div class="container">
    <h1>Edit Post</h1>
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="3" required>{{ $post->body }}</textarea>
        </div>
        <div class="form-group">
    <button type="submit" class="btn btn-primary">Update Post</button>
</div>
</form>
</div>

