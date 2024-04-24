@extends('admin-layouts.app')

@section('admin_title', 'Create/Slider')

@section('admin_content')
	<div class="row">
		<div class="col-lg-12">
			 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit New Slider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('slider.store')}} " method="POST" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Slider Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Input Slider Title">
                  </div>
                  <div class="form-group">
                    <label for="sub_title">Sub Title</label>
                    <textarea id="sub_title" name="sub_title" placeholder="Input Slider Sub Title" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="image">Slider Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Updated">
                </div>
              </form>
            </div>
		</div>
	</div>
@endsection