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
              <h1 class="m-0">Manage Schools</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manage Schools</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Master List</h3>
              <div class="card-tools">
                <a href="{{route('admin.school.add')}}" class="btn btn-primary">
                  Add School
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN.</th>
                  <th>School Name</th>
                  <th>School Address</th>
                  <th>School Level</th>
                  <th>Principal/Owner</th>
                  <th>School Type</th>
                  <th>Affiliated with</th>
                  <th>School Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($schools as $school)
                    <tr>
                      <td>{{$school->sc_br_emi_no}}</td>
                      <td>
                        {{$school->school_name}}({{$school->sc_br_name}})
                      </td>
                      <td>{{$school->sc_br_address}}</td>
                      <td>
                        @if($school->sc_br_level === 'primary')
                        Primary 
                        @elseif($school->sc_br_level === 'middle')
                        Elementary 
                        @elseif($school->sc_br_level === 'secondary')
                        Secondary 
                        @endif
                      </td>
                      <td>
                        Principal: {{$school->principal_name}} ({{$school->principal_phone}})<br/>
                        Onwer: {{$school->owner_name}} ({{$school->owner_phone}})
                      </td>
                      <td>
                        {{$school->sc_br_type}}
                      </td>
                      <td>
                        {{$school->sc_br_affiliated}}
                      </td>
                      <td style="background-color: @if($school->status_name === "UnRegistered") rgb(254, 171, 171) @elseif($school->status_name === "Registered") #90EE90 @elseif($school->status_name === "UnderProcess") #FFFF33 @endif">{{$school->status_name}}</td>
                      <td class="d-flex">
                        <a href="{{route('admin.school.edit',$school->sc_br_id)}}" class="btn btn-primary btn-sm mr-1">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="javascript:void(0);" data-id="{{ $school->sc_br_id }}" data-sc_id="{{ $school->fk_school_id }}" data-name="{{ $school->school_name }}" class="btn btn-danger btn-sm delete-school" data-toggle="modal" data-target="#modal-sm">
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

      <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p id="school_name_model"></p>
            </div>
            <div class="modal-footer justify-content-end">
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              <a href="" class="btn btn-success btn-delete">Yes</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

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

          $(".delete-school").click(function() {
            var schoolBrId = $(this).data("id");
            var schoolId = $(this).data("sc_id");
            var schoolName = $(this).data("name");
            
            const _schoolName = $('#school_name_model');
            const text = `Do You Want to Delete ${schoolName}?`
            _schoolName.text(text);

            var deleteUrl = `/admin/school/delete/${schoolId}/${schoolBrId}`;
            $(".btn-delete").attr('href', deleteUrl);
          });

        });
      </script>
@endsection