@extends('layouts.app')

@section('body')
    <h1>Create New product</h1>

<x-form.validation-error />

    <form enctype="multipart/form-data" action="{{ route('product.store') }}" method="post">

        @csrf

        <div class="mb-3">
            <label for="productName" class="form-label">product name</label>
            <input type="text" value="{{old('product_name')}}" class="form-control" id="productName" name="product_name">
        </div>

        <div class="mb-3">
            <label for="productprice" class="form-label">product price</label>
            <input type="number" value="{{old('product_price')}}" class="form-control" id="productprice" name="product_price">
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">product description</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10">
                {{old('description')}}
            </textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">product image</label>
            <input type="file" class="form-control" id="image" name="image">
            
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="productauther" class="form-label">product auther</label>
                <select class="form-select" id="productauther" name="product_auther">
                    <option>select auther</option>

                    @foreach ($authers as $auther)
                    
                        <option {{old('product_auther') === $auther->id ? 'selected':''}} value="{{$auther->id}}">{{$auther->auther_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="productcategory" class="form-label">product category</label>
                <select class="form-select" id="productcategory" name="product_category">
                    <option>select category</option>

                    @foreach ($categories as $category)
                        <option {{old('product_category') === $category->id ? 'selected':''}} value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn-primary btn">Save</button>
    </form>
@endsection