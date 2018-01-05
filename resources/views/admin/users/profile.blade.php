@extends('layouts.app')

@section('content')

@include('admin.includes.errors');
<div class="panel panel-default">
    <div class="panel-heading">
        Edit profile
    </div>
    <div class="panel-body">
        <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">User</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Upload new avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook profile</label>
                <input type="text" name="facebook" class="form-control" value="{{ $user->profile->facebook }}">
            </div>
            <div class="form-group">
                <label for="youtube">Youtube profile</label>
                <input type="text" name="youtube" class="form-control" value="{{ $user->profile->youtube }}">
            </div>
            <div class="form-group">
                <label for="about">About you</label>
                <textarea name = "about" id="about" cols="6" rows="6" class="form-control">{{ $user->profile->about }}</textarea>
             </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update profile</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
