@extends('layouts.app')

@section('body')
    <h1>{{$product->product_name}} Information</h1>
    
    <p>price is {{$product->product_price}}, it category is {{$product->category->category_name}} and auther  {{$product->auther->auther_name}}</p>
    <h2>Description</h2>
    <p>
        {{$product->product_description === null ? 'There are no inforamtion': $product->product_description}} 
    </p>

    <a href="{{url()->previous()}}">Back</a>
@endsection