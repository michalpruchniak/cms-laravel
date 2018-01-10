@extends('layouts.app')

@section('content')

<div class="col-mg-6">
    <div class="col-lg-3">
        <div class="panel panel-info">
            <div class="panel-heading text-center">PUBLISHED POSTS</div>
            <div class="panel-body text-center">{{ $post_count }}</div>
        </div>
    </div>
</div>
<div class="col-mg-6">
    <div class="col-lg-3">
        <div class="panel panel-danger">
            <div class="panel-heading text-center">TRASHED POSTS</div>
            <div class="panel-body text-center">{{ $trashed_count }}</div>
        </div>
    </div>
</div>
<div class="col-mg-6">
    <div class="col-lg-3">
        <div class="panel panel-info">
            <div class="panel-heading text-center">USERS</div>
            <div class="panel-body text-center">{{ $users_count }}</div>
        </div>
    </div>
</div>
<div class="col-mg-6">
    <div class="col-lg-3">
        <div class="panel panel-info">
            <div class="panel-heading text-center">CATEGORYS</div>
            <div class="panel-body text-center">{{ $categorys_count }}</div>
        </div>
    </div>
</div>

@endsection
