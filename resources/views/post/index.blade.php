@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 " >

                @if(session('status'))
                    <div class="alert alert-info">{{session('status')}}</div>
                @endif

                <div class="card" style="text-align: center">
                    <div class="card-header bg-light">{{ __('پست ها') }}</div>

                    <div class="card-body">
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
                                    <a class="btn btn-primary" href="{{route('post.show',$post->id)}}">نمایش</a>
                                    <span class="m-1"></span>
                                    <a class="btn btn-danger" href="{{route('post.destroy',$post->id)}}">حذف</a>
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

