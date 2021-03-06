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
                        @role('سوپر ادمین|ادمین')
                        <div class="card-text">
                            <a class="card-link" href="{{route('admin.users.index')}}">لیست کاربران</a>
                        </div>
                        <div class="card-text">
                            <a class="card-link" href="{{route('admin.roles.index')}}">لیست نقش ها</a>
                        </div>
                            @endrole
                        <div class="card-text">
                            <a class="card-link" href="{{route('posts.index')}}">لیست پست ها</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
