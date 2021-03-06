@extends('layouts.app')

@section('content')

    @if(count($errors) > 0)
    <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">
                {{ $error }}
            </li>
        @endforeach
    </ul>

    @endif
<div class="panel panel-default">
    <div class="panel-heading">
        Create a new post
    </div>
    <div class="panel-body">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="featured">Title</label>
                <input type="file" name="featured" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                    <p><label for="tags">Select tags<label></p>
                @foreach($tags as $tag)
                <div class="form-check">
                    <input type="checkbox" id="tag_{{ $tag->id }}" name="tags[]" class="form-check-input" value="{{ $tag->id }}">
                    <label class="form-check-label" for="tag_{{ $tag->id }}">{{ $tag->tag }}</label>
                  </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store post</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@stop
@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
            $(document).ready(function() {
                $('#content').summernote();
            });
          </script>
      
@stop