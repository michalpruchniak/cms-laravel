@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
        <thead>
            <th>
                Image
            </th>
            <th>
                Title
            </th>
            <th>
                Edit
            </th>
            <th>
                Restore
            </th>
            <th>
                Delete
            </th>
        </thead>
        <tbody>
            @if($posts->count() > 0)
                    @foreach($posts as $post)
                    <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="80"></td>
                    <td>{{ $post->title }}</td>
                    <td>Edit</td>
                    <td>
                        <a href="{{ route('posts.restore', ['id' => $post->id]) }}" class="btn btn-success btn-sm">Restore</a>
                    </td>
                    <td>
                        <a href="{{ route('posts.kill', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                
                @endforeach
            @else
            <tr>
                <th colspan="5" class="text-center">No elements to display</th>
            </tr>
            @endif
        </tbody>
    </table>
        </div>
    </div>
@stop