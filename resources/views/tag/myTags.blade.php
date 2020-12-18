@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 " >

                @if(session('status'))
                    <div class="alert alert-info">{{session('status')}}</div>
                @endif

                <div class="card" >
                    <div class="card-header bg-light mb-4 d-flex align-items-center justify-content-between">
                        {{ __('تگ ها') }}
                        <div>
                            <a href="{{route('tags.create')}}" class="btn btn-primary">{{"اضافه کردن"}}</a>
                            <a href="{{route('posts.index')}}" class="btn btn-success">{{"مدیریت پست ها"}}</a>
                        </div>
                    </div>


                    <div class="card-body" style="text-align: center">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-success">
                            <th>{{'شناسه'}}</th>
                            <th>{{'عنوان'}}</th>
                            <th>{{'slug'}}</th>
                            <th>{{'عملیات'}}</th>
                            </thead>
                            @forelse($tags as $tag)
                                <tbody>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->title}}</td>
                                <td>{{$tag->slug}}</td>

                                <td class="d-flex flex-row">
                                    <a class="btn btn-primary" href="{{route('tags.show',$tag->id)}}">نمایش پست ها</a>
                                    <span class="m-1"></span>
                                    <a class="btn btn-success" href="{{route('tags.edit',$tag->id)}}">ویرایش</a>
                                    <form action="{{route('tags.destroy',$tag)}}" method="post" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-1" onclick="return confirm('از حذف کار مطمئن هستید؟')">حذف
                                        </button>
                                    </form>
                                </td>

                                </tbody>
                            @empty
                                <div class="alert alert-info">{{"شما هنوز هیچ تگی اضافه نکرده اید."}}</div>
                            @endforelse
                        </table>
                        <div class="mb-4 d-flex align-items-center justify-content-between" dir="ltr">

                            {{$tags->links('pagination::bootstrap-4')}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
