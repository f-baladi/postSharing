@extends('layouts.app')

@section('content')

    @include('partials.publicIndex')

    <div class="container">
        <div class=" row justify-content-center">
            <div class="card-body ">
                <div class="col-md-11 ">
                    <a class="btn btn-info" href="{{route('tags.index')}}">{{ __('بازگشت') }}</a>
                </div>
            </div>
        </div>
    </div>

@endsection

