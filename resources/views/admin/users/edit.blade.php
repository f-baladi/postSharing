@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
    <div class="card-body">
        <form method="post" action=" {{route('admin.users.update' , $user->id)}} ">
            @csrf
            @method('PUT')
            <div class="form-group ">
                <span> {{'افزودن نقش به کاربر'}} </span>
                <hr>
            </div>
            <div class="form-group">
                @forelse ($roles as $role)
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" name='roles[]' {{$user->roles->contains($role) ? 'checked' : ''}} value="{{$role->name}}" class="custom-control-input" id="{{'role' . $role->id}}">
                        <label class="custom-control-label" for="{{'role' . $role->id}}">{{$role->name}}</label>
                    </div>
                @empty
                    <p>
                        {{'نقشی برای کاربر تعریف نشده است.'}}
                    </p>
                @endforelse
            </div>
            <div class="form-group mt-5">
                <span> {{'افزودن دسترسی به کاربر'}} </span>
                <hr>
            </div>
            <div class="form-group">
                @forelse ($permissions as $permission)
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" name='permissions[]' {{$user->permissions->contains($permission) ? 'checked' : ''}} value="{{$permission->name}}" class="custom-control-input" id="{{'permission' . $permission->id}}">
                        <label class="custom-control-label" for="{{'permission' . $permission->id}}">{{$permission->name}}</label>
                    </div>
                @empty
                    <p>
                        {{'دسترسی برای کاربر تعریف نشده است'}}
                    </p>
                @endforelse
            </div>
            <div class="form-group mt-5" style="text-align: left">
                <button class="btn btn-primary"> {{'ویرایش'}} </button>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
@endsection
