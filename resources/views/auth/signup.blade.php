@extends('layouts.app')

@section('title')
    Home Page
@endsection

@section('body')
<H1>sign up</H1>

<x-form.validation-error />
<x-operation.success />

<form method="POST" action="{{ route('auth.handel.signup') }}">
    @csrf

    <div class="mb-3">
        <label for="exampleInputName" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="exampleInputName">
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="useremail" class="form-control" id="exampleInputEmail1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="userpassword" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection