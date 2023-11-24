@extends('admin.layout')

@section('styles')
    <link rel="stylesheet" href="{{asset('/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Locations</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manage Locations</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Locations</h3>
              <div class="card-tools">
                <a href="{{route('admin.location.add')}}" class="btn btn-primary">
                  Add Location
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN.</th>
                  <th>District Name</th>
                  <th>Tehsil Name</th>
                  <th>City Name</th>
                  <th>Area Name</th>
                  <th>SubArea Name</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  {{-- {{dd($locations)}} --}}
                    @foreach ($locations as $location)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>
                        {{ $location->district_name}}
                      </td>
                      <td>{{ $location->tehsil_name}}</td>
                      <td>{{ $location->city_name}}</td>
                      <td>{{ $location->area_name}}</td>
                    <td>
                        {{ $location->subarea_name}}
                    </td>
                    <td>
                    <a href="/admin/locations/edit/{{$location->province_id}}/{{$location->district_id}}/{{$location->tehsil_id}}/{{$location->city_id}}/{{$location->area_id}}/{{$location->subarea_id}}" class="btn btn-primary btn-sm mr-1">
                        
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="btn btn-danger btn-sm">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </section>

      @if(session('error'))
          <input type="hidden" id="error-message" value="{{ session('error') }}">
      @endif

      @if(session('success'))
          <input type="hidden" id="success-message" value="{{ session('success') }}">
      @endif
  
     
@endsection

@section('scripts')
      <script src="{{asset('/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/jszip/jszip.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
      <script src="{{asset('/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
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
@endsection