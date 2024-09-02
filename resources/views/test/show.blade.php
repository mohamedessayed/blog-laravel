@extends('layouts.app')

@section('body')
    <h1>{{$auther->auther_name}} Information</h1>
    
    <p>Nationality is {{$auther->nationality}}, his name is {{$auther->auther_name}} </p>
    <h2>bio</h2>
    <p>
        {{$auther->bio === null ? 'There are no inforamtion': $auther->bio}} 
    </p>

    <a href="{{url()->previous()}}">Back</a>
@endsection