@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header bg-light">{{ __('Posts') }}</div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-info">
                            <th>{{'id'}}</th>
                            <th>{{'title'}}</th>
                            <th>{{'slug'}}</th>
                            <th>{{'author'}}</th>
                            <th>{{'categories'}}</th>
                            <th>{{'tags'}}</th>
                            <th>{{'operations'}}</th>
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
                                <td class="col-2">
                                    <a class="btn btn-primary" href="{{route('post.show',$post->id)}}">Show</a>
                                    <a class="btn btn-danger" href="{{route('post.destroy',$post->id)}}">Delete</a>
                                </td>

                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

