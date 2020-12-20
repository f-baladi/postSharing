@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 " >

                @if(session('status'))
                    <div class="alert alert-info">{{session('status')}}</div>
                @endif

                <div class="card" >
                    <div class="card-header bg-light mb-4 d-flex align-items-center justify-content-between">
                        {{ __('دسته بندی های من') }}
                        <div>
                            <a href="{{route('categories.create')}}" class="btn btn-primary">{{"اضافه کردن"}}</a>
                            <a href="{{route('posts.index')}}" class="btn btn-success">{{"مدیریت پست ها"}}</a>
                        </div>
                    </div>

                    <div class="card-body" style="text-align: center">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-success">
                            <th>{{'شناسه'}}</th>
                            <th>{{'عنوان'}}</th>
                            <th>{{'slug'}}</th>
                            <th>{{'عکس'}}</th>
                            <th>{{'عملیات'}}</th>
                            </thead>
                            @forelse($categories as $category)
                                <tbody>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->slug}}</td>
                                <td><img src="{{$category->image->url}}" height="150px"/></td>


                                <td class="d-flex flex-row">
                                    <a class="btn btn-primary" href="{{route('categories.show',$category->id)}}"> نمایش پست ها</a>
                                    <span class="m-1"></span>
                                    <a class="btn btn-success" href="{{route('categories.edit',$category->id)}}">ویرایش</a>
                                    <form action="{{route('categories.destroy',$category)}}" method="post" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-1" onclick="return confirm('از حذف دسته بندی مطمئن هستید؟')">حذف
                                        </button>
                                    </form>
                                </td>

                                </tbody>
                            @empty
                                <div class="alert alert-info">{{"شما هنوز هیچ دسته بندی اضافه نکرده اید."}}</div>
                            @endforelse
                        </table>
                        <div class="mb-4 d-flex align-items-center justify-content-between" dir="ltr">

                            {{$categories->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

