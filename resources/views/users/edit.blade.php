@extends('layouts.scaffold')

@section('main')

    <h1>Edit User</h1>
    <form method="post" action="/users/{{ $user->id }}">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <ul>
            <li>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}">
            </li>
            <li>
                <input type="submit" value="Update" class="btn btn-info">
                <a href="/users/{{ $user->id }}" class="btn">Cancel</a>
            </li>
        </ul>
    </form>

    @if ($errors->any())
        <ul>
            {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
        </ul>
    @endif

@stop