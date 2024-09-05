@extends('layouts.app')

@section('title')
    Home Page
@endsection

@section('body')
<H1>Hello form dashborad page</H1>

<div class="p-6 text-gray-900">
    {{ __("You're logged in!") }}
</div>


@if (auth()->user()->can('edit articles'))
<button>edit article</button>
    
@endif

@if (auth()->user()->can('edit articles'))
<button>delete article</button>

    
@endif

@if (auth()->user()->can('unpublish articles'))
<button>unpublish article</button>

    
@endif

@if (auth()->user()->can('publish articles'))
<button>publish article</button>
    
@endif

@endsection