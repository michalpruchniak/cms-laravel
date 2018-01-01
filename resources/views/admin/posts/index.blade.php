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
                Trashed
            </th>
        </thead>
        <tbody>
            @if($posts->count() > 0)
                @foreach($posts as $post)
                    <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="80"></td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-info btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">Trash</a>
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