@extends('layouts.scaffold')

@section('main')

<h1>Show Post</h1>

<p><a href="/posts">Return to all posts</a></p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Body</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td><a href="/posts/{{ $post->id }}/edit" class="btn btn-info">Edit</a></td>
            <td>
                <form method="post" action="/posts/{{ $post->id }}">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>
    </tbody>
</table>

@stop