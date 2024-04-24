@extends('admin-layouts.app')
@section('admin_title', 'Create/Category')
@section('admin_content')
<div class="row">
	<div class="col-lg-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Edit Category</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form action="{{ route('category.update', $category->id)}}" method="POST">
				@csrf
				@method('PUT')
				<div class="card-body">
					<div class="form-group">
						<label for="name">Catagory Name</label>
						<input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<input type="submit" class="btn btn-primary" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection