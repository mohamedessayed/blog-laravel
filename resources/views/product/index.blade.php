@extends('layouts.app')


@section('body')
    <h1>product Info.</h1>

    <x-operation.success />
    
    <div class="my-3">
        <a href="{{route('product.create')}}" class="btn btn-primary">Create new product</a>
    </div>
    <div class="my-3 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>product name</th>
                    <th>Price</th>
                    <th>Auther name</th>
                    <th>category name</th>
                    <th>Create at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_price}}</td>
                        <td>{{$product->auther->auther_name}}</td>
                        <td>{{$product->category->category_name}}</td>

                        <td>{{$product->created_at->format('d M Y , h:i A')}}</td>
                        <td>
                            <a href="{{ route('product.show',['product'=>$product->id]) }}">Show</a>
                            <a href="{{ route('product.edit',['product'=>$product->id]) }}" class="text-warning">update</a>
                            <form action="{{ route('product.destroy',['product'=>$product->id]) }}" method="post">
                                
                                @csrf
                                @method('delete')

                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
            
        </table>

        <div class="mt-3">
            {{$products->render()}}
        </div>
    </div>
@endsection