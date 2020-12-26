@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-6">
        <table class="table table-dark table-bordered">
            <thead>
            <tr>
                <th colspan="2" style="text-align: center">{{$user->name}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>ایمیل</td>
                <td>{{$user->email}}</td>
            </tr>

            <tr>
                <td>موبایل:</td>
                <td>{{$user->mobile}}</td>
            </tr>

            <tr>
                <td>وضعیت:</td>
                <td>{{$user->isActive ? 'فعال' : 'غیرفعال'}}</td>
            </tr>

            <tr>
                <td>نقش ها:</td>
                <td>
                    @foreach ($user->roles as $role)
                        <span class="badge badge-info"> {{$role->name}} </span>

                    @endforeach</td>
            </tr>

            <tr>
                <th colspan="2" style="text-align: left">
                    <a href="{{route('admin.users.index')}}" class="btn btn-info">بازگشت</a>
                </th>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
    </div>
@endsection
