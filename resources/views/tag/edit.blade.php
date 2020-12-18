@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1>{{$tag->title}}</h1>
            <a href="{{route('tags.index')}}" class="btn btn-primary">{{"بازگشت"}}</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('tags.update',$tag)}}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="text" class="form-control" name="title" value="{{$tag->title}}">
            </div>

            <button type="submit" class="btn btn-primary">ویرایش</button>
        </form>

    </div>
@endsection
