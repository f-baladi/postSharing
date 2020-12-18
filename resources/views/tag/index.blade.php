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
                            <thead class="bg-info">
                            <th>{{'شناسه'}}</th>
                            <th>{{'عنوان'}}</th>
                            <th>{{'slug'}}</th>
                            <th>{{'عملیات'}}</th>
                            </thead>
                            @foreach($tags as $tag)
                                <tbody>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->title}}</td>
                                <td>{{$tag->slug}}</td>

                                <td class="d-flex flex-row">
                                    <a class="btn btn-primary" href="{{route('tags.show',$tag->id)}}">نمایش</a>
                                    <span class="m-1"></span>
                                    <a class="btn btn-danger" href="{{route('tags.destroy',$tag->id)}}">حذف</a>
                                </td>

                                </tbody>
                            @endforeach
                        </table>
                        <div dir="ltr">

                            {{$tags->links('pagination::bootstrap-4')}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

