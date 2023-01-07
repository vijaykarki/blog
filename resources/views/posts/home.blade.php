<div class="container">
    <h1>All Posts</h1>
    <a href="/posts/create" class="btn btn-primary mb-4">Create Post</a>
    <a href="/logout" > Logout
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Views</th>
                <th>Comments</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->view_count }}</td>
                    <td>{{ $post->comments->count() }}</td>
                    <td><a href="/posts/{{ $post->id }}" class="btn btn-primary">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>