@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">
                        <p>Location: {{ $profile->location }}</p>
                        <p>Bio: {{ $profile->bio }}</p>

                        <h3>Posts</h3>
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
        </div>
    </div>
@endsection
