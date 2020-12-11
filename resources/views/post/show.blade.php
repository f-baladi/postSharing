@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
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

                        <div class="form-group row mb-2 " dir="ltr">
                                <a class="btn btn-info" href="{{route('post.index')}}">{{ __('بازگشت') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
