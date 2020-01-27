@extends('layouts.app')
@section('content')
    <div class="form-container">
        <h3>Edit post</h3>
    <form action="{{ route('update', $post->id )}}" method="post">
            {{ csrf_field() }}
            <label for="title">Title</label>
    <input name="title" id="title" type="text" value="{{$post->title}}" required />
            <label for="desc">Description</label>
            <textarea name="desc" id="desc" cols="30" rows="10" required>{{$post->description}}</textarea>
            <input type="submit" value="Submit Post">
            {{-- {{ Form::token() }} --}}
            {{ method_field('put') }}
        </form>
    </div>
@endsection
