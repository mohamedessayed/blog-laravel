@extends('layouts.app')

@section('title')
    @lang('login.title')
@endsection

@section('body')
<H1>@lang('login.heading')</H1>

<x-form.validation-error />
<x-operation.success />

<form method="POST" action="{{ route('auth.handel.login') }}">
    @csrf

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">@lang('login.input.email')</label>
      <input type="email" name="useremail" class="form-control" id="exampleInputEmail1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">@lang('login.input.password')</label>
      <input type="password" name="userpassword" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">@lang('login.button')</button>
  </form>

  <div class="my-3">
    <h2>{{__('login.social.login.title')}}</h2>
    <div>
      <a href="{{ route('github') }}">GitHub</a>
    </div>
  </div>
@endsection