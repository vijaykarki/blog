@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            
                    </div>
                    <hr>
                    <h1>Your Posts</h1>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>

                                <td>{{$post->title}}</td>
                            <td> <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>
                                <form method="post" action="/delete/{{ $post->id }}">
                                    <input name="_method" type="hidden" value="DELETE"> 
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                       
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                    
                                </form>
                            </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
