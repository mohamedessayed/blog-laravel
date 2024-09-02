@extends('layouts.app')


@section('body')
    <h1>Auther Info.</h1>

    <x-operation.success />
    
    <div class="my-3">
        <a href="{{route('auther.create')}}" class="btn btn-primary">Create new auther</a>
    </div>
    <div class="my-3 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Auther name</th>
                    <th>Nationality</th>
                    <th>Create at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($authers as $auther)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$auther->auther_name}}</td>
                        <td>{{$auther->auther_country}}</td>
                        <td>{{$auther->created_at->format('d M Y , h:i A')}}</td>
                        <td>
                            <a href="{{ route('auther.show',['auther'=>$auther->id]) }}">Show</a>
                            <a href="{{ route('auther.edit',['auther'=>$auther->id]) }}" class="text-warning">update</a>
                            <form  action="{{ route('auther.destroy',['auther'=>$auther->id]) }}" method="post">
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
            {{$authers->render()}}
        </div>
    </div>
@endsection