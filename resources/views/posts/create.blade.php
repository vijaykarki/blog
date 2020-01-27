@extends('layouts.app')
@section('content')
    <div class="form-container">
        <h3>Create new post</h3>
        <form action="/store" method="get" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="title">Title</label>
            <input name="title" id="title" type="text" placeholder="title here" required />
            <label for="desc">Description</label>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="please write descrion" required></textarea>
            <input type="file" name="cover_image" id="cover_image">
            <input type="submit" value="Submit Post">
        </form>
    </div>
@endsection
