@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 " >

                @if(session('status'))
                    <div class="alert alert-info">{{session('status')}}</div>
                @endif

                <div class="card" style="text-align: center">
                    <div class="card-header bg-light">{{ __('تگ ها') }}</div>

                    <div class="card-body">
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

                                <td >
                                    <a class="btn btn-primary" href="{{route('tags.show',$tag->id)}}">نمایش پست ها</a>
                                </td>

                                </tbody>
                            @empty
                                <div class="alert alert-info">{{"شما هنوز هیچ تگی اضافه نکرده اید."}}</div>
                            @endforelse
                        </table>
                        <div class="mb-4 d-flex align-items-center justify-content-between" dir="ltr">

                            {{$tags->links('pagination::bootstrap-4')}}
                            <a class="btn btn-info" href="{{route('posts.index')}}">{{ __('بازگشت') }}</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

