@extends('admin-layouts.app')

@section('admin_title', 'Create/Item')

@section('admin_content')
	<div class="row">
		<div class="col-lg-12">
			 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Item</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('category.store')}}" method="POST">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Input Catagory Name">
                  </div>
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Add">
                  <a href="{{ route('item.index')}}" class="btn btn-danger float-right mx-2">Back</a>
                </div>
              </form>
            </div>
		</div>
	</div>
@endsection