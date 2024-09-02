@extends('layouts.app')

@section('body')
    <h1>Create New category</h1>

<x-form.validation-error />

    <form action="{{ route('category.store') }}" method="post">

        @csrf

        <div class="mb-3">
            <label for="categoryName" class="form-label">category name</label>
            <input type="text" value="{{old('category_name')}}" class="form-control" id="categoryName" name="category_name">
        </div>
        <button type="submit" class="btn-primary btn">Save</button>
    </form>
@endsection