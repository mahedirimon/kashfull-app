@extends('admin-layouts.app')

@section('admin_title', 'Slider/Kashfull Rooftop')

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
                <h3 class="card-title"><a href="{{ route('slider.create')}}" class="btn btn-info">Add New</a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($sliders as $key=>$slider)
                    <tr>
                      <td>{{ $key+1  }}</td>
                       <td>{{ $slider->title  }}</td>
                       <td>{{ $slider->sub_title  }}</td>
                       <td><img src="{{ asset('uploads/slider/'.$slider->image) }}" style=" height: 70px; width: 200px;"></td>
                       <td>
                         <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-info btn-sm">Edit</a>




                         <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy',$slider->id) }}" method="POST" style="display: none;">
                          @csrf
                          @method('DELETE')
                          </form>

                          <button type="button" class="btn btn-danger btn-sm confirmDelete" onclick="if (confirm('Are You Sure to delete this?')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $slider->id }}').submit()};">Delete</button>
                       </td>
                    </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Image</th>
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


@push('script')
  <script>
    $('.confirmDelete').click(function(e){
      e.preventDefault();
      Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });
  }
});

    });
  </script>

@endpush