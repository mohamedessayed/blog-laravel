@extends('layouts.app')

@section('body')
    <h1>Edit category</h1>

    <x-form.validation-error />

    <form action="{{ route('category.update', ['category'=>$category->id]) }}" method="post">

        @csrf
        @method('put')

        <div class="mb-3">
            <label for="categoryName" class="form-label">category name</label>
            <input type="text" value="{{old('category_name') ?? $category->category_name}}" class="form-control" id="categoryName" name="category_name">
        </div>
        
    
        <button type="submit" class="btn-primary btn">Update data</button>
    </form>
@endsection