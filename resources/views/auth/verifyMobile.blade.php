@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                @if(session('message'))
                    <div class="alert alert-info">{{session('message')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('تایید شماره همراه') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('verify.mobile') }}">
                            @csrf

                            <div class="form-group row">
                                    <input id="mobile" type="hidden" class="form-control " name="mobile"
                                           value="{{ \Illuminate\Support\Facades\Cache::get('mobile') }}" required autocomplete="mobile" autofocus>
                            </div>

                            <div class="form-group row">
                                <label for="code" class="col-md-2 col-form-label text-md-right">{{ __('کد تایید') }}</label>

                                <div class="col-md-6">
                                    <input name="code" type="text" class="form-control " value="{{\Illuminate\Support\Facades\Cache::get(\Illuminate\Support\Facades\Cache::get('mobile'))}}">

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary " >
                                        {{ __('تایید') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
