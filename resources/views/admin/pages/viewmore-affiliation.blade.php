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
              <h1 class="m-0">Affiliation Data</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Affiliation Record</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Affiliation Form Detail</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table">
                    <tr>
                        <th>Institute Name</th>
                        <td>{{ $affiliation->institute_name }}</td>
                    </tr>
                    <tr>
                        <th>Institute Address</th>
                        <td>{{ $affiliation->institute_address }}</td>
                    </tr>
                    <tr>
                        <th>Affiliation Type</th>
                        <td>{{ $affiliation->affiliation_type }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $affiliation->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $affiliation->email }}</td>
                    </tr>
                    <tr>
                        <th>Latitude</th>
                        <td>{{ $affiliation->latitude }}</td>
                    </tr>
                    <tr>
                        <th>Longitude</th>
                        <td>{{ $affiliation->longitude }}</td>
                    </tr>
                    <tr>
                        <th>Registration Type</th>
                        <td>{{ $affiliation->registration_type }}</td>
                    </tr>
                    <tr>
                        <th>Registration Issue Date</th>
                        <td>{{ $affiliation->registration_issue_date }}</td>
                    </tr>
                    <tr>
                        <th>Registration Expiry Date</th>
                        <td>{{ $affiliation->registration_expiry_date }}</td>
                    </tr>
                    <tr>
                        <th>Franchise Name</th>
                        <td>{{ $affiliation->franchise_name }}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>{{ $affiliation->city }}</td>
                    </tr>
                    <tr>
                        <th>Tehsil</th>
                        <td>{{ $affiliation->tehsil }}</td>
                    </tr>
                    <tr>
                        <th>District</th>
                        <td>{{ $affiliation->district }}</td>
                    </tr>
                    <tr>
                        <th>Province</th>
                        <td>{{ $affiliation->province }}</td>
                    </tr>
                    <tr>
                        <th>Group Name</th>
                        <td>{{ $affiliation->group_name }}</td>
                    </tr>
                    <tr>
                      <th>Front CNIC Image</th>
                      <td>
                          <img src="{{ asset('storage/' . $affiliation->front_cnic_path) }}" alt="Front Side of CNIC" style="max-width: 100px; height: auto; margin-bottom= 5px;">
                      </td>
                  </tr>
                  <tr>
                      <th>Back CNIC Image</th>
                      <td>
                          <img src="{{ asset('storage/' . $affiliation->back_cnic_path) }}" alt="Back Side of CNIC" style="max-width: 100px; height: auto margin-bottom= 5px;">
                      </td>
                  </tr>
                  
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