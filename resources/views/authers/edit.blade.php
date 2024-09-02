@extends('layouts.app')

@section('body')
    <h1>Edit Auther</h1>

    <x-form.validation-error />

    <form action="{{ route('auther.update', ['auther'=>$auther->id]) }}" method="post">

        @csrf
        @method('put')

        <div class="mb-3">
            <label for="autherName" class="form-label">Auther name</label>
            <input type="text" value="{{old('auther_name') ?? $auther->auther_name}}" class="form-control" id="autherName" name="auther_name">
        </div>
        
    
        <div class="mb-3">
            <label for="bio" class="form-label">Auther Bio</label>
            <textarea name="bio" class="form-control" id="bio" cols="30" rows="10">{{old('bio') ?? $auther->bio}}</textarea>
        </div>


        

        <button type="submit" class="btn-primary btn">Update data</button>
    </form>
@endsection