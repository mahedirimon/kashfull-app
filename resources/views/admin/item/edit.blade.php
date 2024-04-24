@extends('admin-layouts.app')

@section('admin_title', 'Edit/Item')

@section('admin_content')
  <div class="row">
    <div class="col-lg-12">
       <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Item</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('item.update',$item->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Item Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <select class="form-control" name="category">
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>

                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="card-body">
                  <div class="form-group">
                    <label for="price">Item Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $item->price }}">
                  </div>
                </div>

                <div class="card-body">
                  <div class="form-group">
                    <label for="details">Item Details</label>
                    <textarea name="details" id="details" class="form-control">{{ $item->details }}</textarea>
                  </div>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Add">
                  <a href="{{ route('item.index') }}" class=" btn btn-primary float-right mx-2">Back</a>
                </div>
              </form>
            </div>
    </div>
  </div>
@endsection