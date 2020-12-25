@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <div class="card ">
                    <div class="card-header bg-light">{{ __('لیست کاربران') }}</div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-info">
                            <th>{{'شناسه'}}</th>
                            <th>{{'نام'}}</th>
                            <th>{{'ایمیل'}}</th>
                            <th>{{'موبایل'}}</th>
                            <th>{{'نقش'}}</th>
                            <th>{{'وضعیت'}}</th>
                            <th>{{'عملیات'}}</th>
                            </thead>
                            @foreach($users as $user)
                                <tbody>
                                <td>{{$user->id}}</td>
                                <td><a style="color: black" href="{{route('admin.users.show',$user)}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->mobile}}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-secondary"> {{$role->name}} </span>

                                @endforeach
                                </td>
{{--                                <td> <a href="{{route('admin.users.edit' , $user->id)}}"> @lang('users.edit') </a> </td>--}}
                                <td id="activity_{{$user->id}}">{{$user->isActive ? 'فعال' : 'غیرفعال'}}</td>
                                <td class="d-flex flex-row">
                                    <button class="btn btn-warning" onclick="activityUser({{$user->id}})">تغییر وضعیت</button>
{{--                                    <form action="{{route('admin.users.activity',$user)}}" method="post" >--}}
{{--                                        @csrf--}}
{{--                                        <button class="btn btn-warning m-1" onclick="return confirm('از تغییر وضعیت مطمئن هستید؟')">تغییر وضعیت</button>--}}
{{--                                    </form>--}}

                                    <form action="{{route('admin.users.destroy',$user)}}" method="post" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-1" onclick="return confirm('از حذف کاربر مطمئن هستید؟')">حذف</button>
                                    </form>

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
@section('script')
    <script>


        function activityUser(id) {
            $.ajax({
                'method': 'post',
                'url': '{{route('admin.users.activity')}}?id='+id+'&_token='+$('meta[name="csrf-token"]').attr('content'),
                success: function (response) {
                    console.log(response)
                    if (response.success)
                        $('#activity_'+id).html(response.data.isActive ? 'فعال' : 'غیرفعال');
                }
            })
        }
    </script>
@endsection
