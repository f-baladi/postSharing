@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 " >

                @if(session('status'))
                    <div class="alert alert-info">{{session('status')}}</div>
                @endif

                <div class="card" >
                    <div class="card-header bg-light mb-4 d-flex align-items-center justify-content-between">
                        {{ __('پست ها') }}

                        <div>
                            <a href="{{route('posts.create')}}" class="btn btn-primary">{{"اضافه کردن"}}</a>
                            <a href="{{route('tags.myTags')}}" class="btn btn-success">{{"مدیریت تگ ها"}}</a>
                            <a href="{{route('categories.index')}}" class="btn btn-info">{{"مدیریت دسته بندی"}}</a>
                        </div>
                    </div>

                    <div class="card-body " style="text-align: center">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-info">
                            <th>{{'شناسه'}}</th>
                            <th>{{'عنوان'}}</th>
                            <th>{{'slug'}}</th>
                            <th>{{'نویسنده'}}</th>
                            <th>{{'دسته بندی ها'}}</th>
                            <th>{{'تگ ها'}}</th>
                            <th>{{'عملیات'}}</th>
                            </thead>
                            @foreach($posts as $post)
                                <tbody>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->slug}}</td>
                                <td>{{$post->author->name}}</td>
                                <td>
                                    @foreach($post->categories as $category)
                                        <span class="badge badge-info">{{$category->title}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($post->tags as $tag)
                                        <span class="badge badge-success">{{$tag->title}}</span>
                                    @endforeach
                                </td>
                                <td class="d-flex flex-row">
                                    <a class="btn btn-primary" href="{{route('posts.show',$post->id)}}">نمایش</a>
                                    <span class="m-1"></span>
                                    <a class="btn btn-danger" href="{{route('posts.destroy',$post->id)}}">حذف</a>
                                </td>

                                </tbody>
                            @endforeach
                        </table>
                        <div dir="ltr">

                            {{$posts->links('pagination::bootstrap-4')}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

