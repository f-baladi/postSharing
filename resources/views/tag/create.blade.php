@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1>تگ جدید</h1>
            <a href="{{route('tags.myTags')}}" class="btn btn-primary">{{"بازگشت"}}</a>
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

        <form action="{{route('tags.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">عنوان</label>
                <input type="text" class="form-control" name="title">
            </div>

            <button type="submit" class="btn btn-primary">اضافه کردن</button>
        </form>

    </div>
@endsection


