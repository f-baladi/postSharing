@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">

                    @if(session('status'))
                        <div class="alert alert-info">{{session('status')}}</div>
                    @endif

                    <div class="card-header badge-success">{{ $post->title }}</div>

                    <div class="card-body">

                        <div class="row justify-content-center" style="margin: auto ">
                            <img src="{{$post->image->path}}" height="150px"/>
                        </div>

                        <div class="mb-2">
                            <textarea class="col-md-12 m-2 ">{{$post->content}}</textarea>
                        </div>

                        <div class="card-footer mb-2 ">
                            <h5 class="card-text">{{"تگ ها"}}</h5>
                            <p class="card-text">{{$post->tags->implode('title' , '، ')}}</p>
                        </div>

                        <div class="card-footer mb-2">
                            <h5 class="card-text">{{"دسته بندی ها"}}</h5>
                            <p class="card-text">{{$post->categories->implode('title' , '، ')}}</p>
                        </div>

                        <div class="mb-4 d-flex align-items-center justify-content-between" dir="ltr">
                                <a class="btn btn-info" href="{{route('post.index')}}">{{ __('بازگشت') }}</a>
                            <div>
                                @if ($post->status)
                                    <a class="btn btn-info" href="{{route('post.draft', $post)}}">{{ __('تبدیل به پیش نویس') }}</a>
                                @else
                                    <a class="btn btn-success" href="{{route('post.publish',$post)}}">{{ __('تبدیل به انتشار') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
