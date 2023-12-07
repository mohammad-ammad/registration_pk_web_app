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
              <h1 class="m-0">Edit Affiliation</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Affiliation</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <!-- code here -->
                <div class="card-header">
                    <h3 class="card-title">Affiliation Form Detail</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <!-- Display Affiliation Details -->
                      <form action="{{ route('admin.update.affiliation', ['id' => $affiliation->id]) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div>
                        <label for="" class="text-sm font-semibold">Institute Name:</label>
                        <input type="text" name="instituteName" value="{{ $affiliation->institute_name }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Institute Address:</label>
                        <input type="text" name="instituteAddress" value="{{ $affiliation->institute_address }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Affiliation Type:</label>
                        <select name="affiliationType" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                            <option value="HSSC" {{ $affiliation->affiliation_type == 'HSSC' ? 'selected' : '' }}>HSSC</option>
                            <option value="SSC" {{ $affiliation->affiliation_type == 'SSC' ? 'selected' : '' }}>SSC</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Whatsapp/Phone No:</label>
                        <input type="text" name="phoneNumber" value="{{ $affiliation->phone_number }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Email:</label>
                        <input type="email" name="email" value="{{ $affiliation->email }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Latitude:</label>
                        <input type="text" name="latitude" value="{{ $affiliation->latitude }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Longitude:</label>
                        <input type="text" name="longitude" value="{{ $affiliation->longitude }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Affiliation Type:</label>
                        <select name="registrationType" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                            <option value="PERIA" {{ $affiliation->registration_type == 'PERIA' ? 'selected' : '' }}>PERIA</option>
                            <option value="PEPRIS" {{ $affiliation->registration_type == 'PEPRIS' ? 'selected' : '' }}>PEPRIS</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Private Registration Issue Date:</label>
                        <input type="date" name="registrationIssueDate" value="{{ $affiliation->registration_issue_date }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Private Registration Expiry Date:</label>
                        <input type="date" name="registrationExpiryDate" value="{{ $affiliation->registration_expiry_date }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Franchise Name:</label>
                        <input type="text" name="franchiseName" value="{{ $affiliation->franchise_name }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>
                    
                    <div>
                        <label for="" class="text-sm font-semibold">City Name:</label>
                        <input type="text" name="city" value="{{ $affiliation->city }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>  
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Tehsil Name:</label>
                        <input type="text" name="tehsil" value="{{ $affiliation->tehsil }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>  
                    
                    <div>
                        <label for="" class="text-sm font-semibold">District Name:</label>
                        <input type="text" name="district" value="{{ $affiliation->district }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>  
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Province Name:</label>
                        <input type="text" name="province" value="{{ $affiliation->province }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div>
                    
                    <div>
                        <label for="" class="text-sm font-semibold">Group:</label>
                        <input type="text" name="group" value="{{ $affiliation->group_name }}" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    </div> 
                      <!-- Display CNIC Images -->
                      <div class="form-group">
                        <label for="" class="text-sm font-semibold">Front Side Of CNIC:</label>
                        <img src="{{ asset('storage/' . $affiliation->front_cnic_path) }}" alt="Front Side of CNIC" style="width: 200px; height: auto; margin-bottom: 5px;">
                        <input type="file" name="frontCnic" class="form-control" accept="image/*">
                    </div>
                    
                    <!-- Display the current Back Side Of CNIC -->
                    <div class="form-group">
                        <label for="" class="text-sm font-semibold">Back Side Of CNIC:</label>
                        <img src="{{ asset('storage/' . $affiliation->back_cnic_path) }}" alt="Back Side of CNIC" style="width: 200px; height: auto; margin-bottom: 5px;">
                        <input type="file" name="backCnic" class="form-control" accept="image/*">
                    </div>
                    <!-- Submit Button -->
                        <div class="card-tools">
                          <button type="submit" class="btn btn-primary">
                            submit
                          </button>
                        </div>
                      </form>
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