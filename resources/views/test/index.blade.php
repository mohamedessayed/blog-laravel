@extends('layouts.app')

@section('body')
    <h1>Authers Page</h1>

<div>
    <a href="{{route('auther.create')}}">Create a new Auther</a>
</div>

@if (Session::get('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

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
                @foreach ($authers as $item)
                
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->auther_name}}</td>
                        <td>{{$item->nationality}}</td>
                        <td>{{$item->created_at->format('d/m/Y h:i A')}}</td>
                        <td><a href="{{route('auther.show',$item->id)}}" class="btn btn-danger">show</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection