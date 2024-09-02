@extends('layouts.app')

@section('body')
    <h1>Edit product</h1>

    <x-form.validation-error />

    <form enctype="multipart/form-data" action="{{ route('product.update', ['product'=>$product->id]) }}" method="post">

        @csrf
        @method('put')

        <div class="mb-3">
            <label for="productName" class="form-label">product name</label>
            <input type="text" value="{{old('product_name') ?? $product->product_name}}" class="form-control" id="productName" name="product_name">
        </div>
        
    
        <div class="mb-3">
            <label for="description" class="form-label">product description</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{old('description') ?? $product->description}}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">product image</label>
            <input type="file" class="form-control" id="image" name="image">
            
        </div>
        

        <button type="submit" class="btn-primary btn">Update data</button>
    </form>
@endsection