@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="content">
            <div class="title m-b-md">
                MAGUS
            </div>
            @foreach($tasks as $task)
                <div class="col-md-6 mb-2 mt-2">
                    <ul class="list-group">

                        <li class="list-group-item">{{$task->from}}</li>

                        <li class="list-group-item">{{$task->to}}</li>
                        <li class="list-group-item">{{$task->html}}</li>
                        <li class="list-group-item">{{$task->subject}}</li>
                        <li class="list-group-item">{{$task->isActive()}}</li>

                    </ul>
                </div>
            @endforeach
            <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://vapor.laravel.com">Vapor</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>

{{--@foreach($tasks as $task)--}}
            {{--<div class="col-md-6 mb-2 mt-2">--}}
                {{--<ul class="list-group">--}}
                    {{--<li class="list-group-item">{{$task->mailFrom()['email']}}</li>--}}
                    {{--<li class="list-group-item">{{$task->from}}</li>--}}
                    {{--<li class="list-group-item">{{$task->to}}</li>--}}
                    {{--<li class="list-group-item">{{$task->html}}</li>--}}
                    {{--<li class="list-group-item">{{$task->subject}}</li>--}}
                    {{--<li class="list-group-item">{{$task->isActive()}}</li>--}}

                {{--</ul>--}}
            {{--</div>--}}
{{--@endforeach--}}

    </div>
</div>
@endsection
