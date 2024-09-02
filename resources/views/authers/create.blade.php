@extends('layouts.app')

@section('body')
    <h1>Create New Auther</h1>

<x-form.validation-error />

    <form action="{{ route('auther.store') }}" method="post">

        @csrf

        <div class="mb-3">
            <label for="autherName" class="form-label">Auther name</label>
            <input type="text" value="{{old('auther_name')}}" class="form-control" id="autherName" name="auther_name">
        </div>
        
        {{-- @error('auther_name')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror --}}
    
        <div class="mb-3">
            <label for="bio" class="form-label">Auther Bio</label>
            <textarea name="bio" class="form-control" id="bio" cols="30" rows="10">
                {{old('bio')}}
            </textarea>
        </div>

        {{-- @error('bio')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror --}}

        

        <button type="submit" class="btn-primary btn">Save</button>
    </form>
@endsection