@extends('layouts.scaffold')

@section('main')

<h1>All Posts</h1>

<p><a href="/posts/create">Add new post</a></p>

@if ($posts->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
				<th>Body</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no posts
@endif

@stop