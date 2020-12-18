@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 " >

                @if(session('status'))
                    <div class="alert alert-info">{{session('status')}}</div>
                @endif

                <div class="card" style="text-align: center">
                    <div class="card-header bg-light">{{ __('دسته بندی ها') }}</div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-success">
                            <th>{{'شناسه'}}</th>
                            <th>{{'عنوان'}}</th>
                            <th>{{'slug'}}</th>
                            <th>{{'عکس'}}</th>
                            <th>{{'عملیات'}}</th>
                            </thead>
                            @foreach($categories as $category)
                                <tbody>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->slug}}</td>
                                <td><img src="{{$category->image->path}}" height="150px"/></td>


                                <td >
                                    <a class="btn btn-primary" href="{{route('categories.show',$category->id)}}"> نمایش پست ها</a>
                                </td>

                                </tbody>
                            @endforeach
                        </table>
                        <div class="mb-4 d-flex align-items-center justify-content-between" dir="ltr">

                            {{$categories->links('pagination::bootstrap-4')}}
                            <a class="btn btn-info" href="{{route('posts.index')}}">{{ __('بازگشت') }}</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

