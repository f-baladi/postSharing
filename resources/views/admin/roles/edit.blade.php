@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
<div class="card">
    <div class="card-header">
        {{'ویرایش نقش'}}
    </div>
    <div class="card-body">
    <form method="post" action="{{route('admin.roles.update' , $role->id)}}">
        @csrf
        @method('PUT')
            <div class="form-row">
                <div class="col">
                <input type="text" name="name" class="form-control" value="{{$role->name}}" placeholder=" نام نقش ">
                    @if($errors->has('name'))
                    <small class="form-text text-danger"> {{$errors->first('name')}} </small>
                    @endif
                </div>

            </div>
            <div class="form-group mt-5">
                <span>
                    {{'افزودن دسترسی به نقش'}}
                </span>
                <hr>
            </div>
            <div class="form-group">
        @forelse ($permissions as $permission)
        <div class="custom-control custom-checkbox custom-control-inline">
        <input type="checkbox" name='permissions[]' {{$role->permissions->contains($permission) ? 'checked' : ''}} value="{{$permission->name}}" class="custom-control-input" id="{{'permission' . $permission->id}}">
        <label class="custom-control-label" for="{{'permission' . $permission->id}}">{{$permission->name}}</label>
        </div>
        @empty
           <p>
               @lang('دسترسی تعریف نشده است.')
               </p>
        @endforelse
            </div>
            <div class="form-group" style="text-align: left">
                <button class="btn btn-primary">ویرایش</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
@endsection
