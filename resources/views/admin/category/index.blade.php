@extends('admin-layouts.app')

@section('admin_title', 'Category/Kashfull Rooftop')

@push('css')
	<link rel="stylesheet" href="{{ asset('backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('backend')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('admin_content')

<div class="row">
	<div class="col-lg-12">
		<div class="card">
              <div class="card-header">
                <h3 class="card-title"><a href="{{ route('category.create')}}" class="btn btn-info">Add New</a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>SL</th>
                      <th>Category Name</th>
                      <th>Category Slug</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $key=>$category)
                    <tr>
                      <td>{{ $key+1  }}</td>
                       <td>{{ $category->name  }}</td>
                       <td>{{ $category->slug  }}</td>
                       <td>
                         <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info btn-sm">Edit</a>
                         <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" method="POST" style="display: none;">
                          @csrf
                          @method('DELETE')
                          </form>

                          <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Are You Sure to delete this?')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $category->id }}').submit()};">Delete
                          </button>
                       </td>
                    </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Slug</th>
                   <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
	</div>
</div>

@endsection

@push('js')
	<script src="{{ asset('backend'/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend'/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend'/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend'/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('backend'/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('backend'/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('backend'/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('backend'/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('backend'/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('backend'/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('backend'/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('backend'/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush