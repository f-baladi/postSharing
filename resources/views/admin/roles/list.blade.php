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
				{{'افزودن نقش'}}
			</div>
			<div class="card-body">
			<form method="post" action="{{route('admin.roles.store')}}">
					@csrf
					<div class="row">
						<div class="col-md-5">
							<input type="text" name="name" class="form-control  " placeholder=" نام نقش ">
							@if($errors->has('name'))
							<small class="form-text text-danger"> {{$errors->first('name')}} </small>
							@endif
						</div>

						<div class="col-md-2">
							<button class="btn btn-primary btn-sm">
							{{'افزودن'}}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="card mt-5">
			<div class="card-header">
				{{'لیست نقش ها'}}
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">نام نقش</th>
							<th scope="col">عملیات </th>
						</tr>
					</thead>
					<tbody>
						@forelse ($roles as $role)
						<tr>
							<td> {{$role->name}} </td>
						<td> <a class="btn btn-info" href="{{route('admin.roles.edit' , $role->id)}}"> ویرایش </a> </td>
						</tr>
						@empty
						<p>
							{{'نقشی تعریف نشده است'}}
							</p>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
		</div>
		</div>
		</div>
@endsection
