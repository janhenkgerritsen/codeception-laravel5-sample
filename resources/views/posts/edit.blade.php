@extends('layouts.scaffold')

@section('main')

<h1>Edit Post</h1>
{!! Form::model($post, array('method' => 'PATCH', 'route' => array('posts.update', $post->id))) !!}
    <ul>
        <li>
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title') !!}
        </li>

        <li>
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body') !!}
        </li>

        <li>
            {!! Form::submit('Update', array('class' => 'btn btn-info')) !!}
            {!! link_to_route('posts.show', 'Cancel', $post->id, array('class' => 'btn')) !!}
        </li>
    </ul>
{!! Form::close() !!}

@if ($errors->any())
    <ul>
        {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
    </ul>
@endif

@stop