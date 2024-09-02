@extends('layouts.app')

@section('body')
    <h1>{{$category->category_name}} category</h1>
    
    <h3>Product</h3>

    <table class="table">
        <tbody>
            @foreach ($category->products as $product)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product->product_name}}</td>
        </tr>
    @endforeach
        </tbody>
    </table>
    <a href="{{url()->previous()}}">Back</a>
@endsection