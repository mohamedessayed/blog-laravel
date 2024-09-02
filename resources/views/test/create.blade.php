@extends('layouts.app')

@section('body')
    <h1>Create New Auther</h1>

    <form action="{{route('auther.store')}}" method="post">

        @csrf

        <div class="mb-3">
            <label for="autherName" class="form-label">Auther name</label>
            <input type="text" class="form-control" id="autherName" name="auther_name">
        </div>
        @error('auther_name')
            <small class="text-danger">{{$message}}</small>
        @enderror

        <div class="mb-3">
            <label for="bio" class="form-label">Auther Bio</label>
            <textarea name="bio" class="form-control" id="bio" cols="30" rows="10"></textarea>
        </div>

        @error('bio')
            <small class="text-danger">{{$message}}</small>
        @enderror

        <button type="submit" class="btn-primary btn">Save</button>
    </form>
@endsection