@extends('admin.layout')

@section('styles')
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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
      <!-- /.content-header -->

      <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form action="{{route('admin.school.store')}}" method="post">
                  @csrf
                <div class="card-header">
                  <h3 class="card-title">Add School Name</h3>
      
                  <div class="card-tools">
                    <button type="submit" class="btn btn-primary">
                      submit
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display:flex; justify-content:center; align-items: center">
                    <div class="form-group" style="width:40%; ">
                        <label for="">School Name</label>
                        <input type="text" name="school_name" class="form-control" id="" placeholder="Enter School Name" required>
                      </div>
                </div>
            </form>
              </div>
        </div><!-- /.container-fluid -->
      </div>
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form action="{{route('admin.school.store_branch')}}" method="post">
                  @csrf
                <div class="card-header">
                  <h3 class="card-title">Add School Branch</h3>
      
                  <div class="card-tools">
                    <button type="submit" class="btn btn-primary">
                        submit
                      </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Select School</label>
                          <select class="form-control select2bs4" name="school_name" id="dynamicSchools" style="width: 100%;" required>                  
                          </select>
                        </div>
                      </div>
  
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Branch Name</label>
                            <input type="text" name="branch_name" class="form-control" id="" placeholder="Enter Branch Name" required>
                          </div>
                      </div>
  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">School Address</label>
                                <input type="text" name="school_address" class="form-control" id="" placeholder="Enter School Address" required>
                              </div>
                        </div>
  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School status</label>
                                <select class="form-control" name="school_status" style="width: 100%;" required>
                                  <option value="2">Un-Registered</option>
                                  <option value="1">Registered</option>
                                  <option value="3">Under Progress</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">No of Boys</label>
                                <input type="text" name="no_of_boys" class="form-control" id="" placeholder="Enter No of Boys" >
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">No of Girls</label>
                                <input type="text" name="no_of_girls" class="form-control" id="" placeholder="Enter No of Girls" >
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Covered Area</label>
                                <input type="text" name="covered_area" class="form-control" id="" placeholder="Enter Covered Area" >
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">No of Teachers</label>
                                <input type="text" name="no_of_teachers" class="form-control" id="" placeholder="Enter No of Teachers" >
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School Type</label>
                                <select class="form-control" name="school_type" style="width: 100%;">
                                  <option value="boys">Boys</option>
                                  <option value="girls">Girls</option>
                                  <option value="combined">Co-education</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Instruction Medium</label>
                                <select class="form-control" name="instruction_medium" style="width: 100%;">
                                  <option value="english">English</option>
                                  <option value="urdu">Urdu</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School Level</label>
                                <select class="form-control" name="school_level" style="width: 100%;">
                                  <option value="primary">Primary</option>
                                  <option value="middle">Elementary</option>
                                  <option value="secondary">Secondary</option>
                                  <option value="higher_secondary">Higher Secondary</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                              <label>School Affiliated with</label>
                              <select class="form-control" name="school_affiliated" style="width: 100%;" >
                                <option value="BISE">BISE</option>
                                <option value="FBISE">FBISE</option>
                                <option value="NO">not Affiliated</option>
                              </select>
                            </div>
                      </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Owner Name</label>
                                <input type="text" name="owner_name" class="form-control" id="" placeholder="Enter Owner Name" >
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Owner Phone No</label>
                                <input type="text" name="owner_ph_no" class="form-control" id="" placeholder="Enter Owner Phone No" >
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Owner Email</label>
                                <input type="email" name="owner_email" class="form-control" id="" placeholder="Enter Owner Email" >
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Principal Name</label>
                                <input type="text" name="principal_name" class="form-control" id="" placeholder="Enter Principal Name" >
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Principal Phone No</label>
                                <input type="text" name="principal_ph_no" class="form-control" id="" placeholder="Enter Principal Phone No" >
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Principal Email</label>
                                <input type="email" name="principal_email" class="form-control" id="" placeholder="Enter Principal Email" >
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Select Province</label>
                                <select class="form-control select2bs4" id="provinceDropdown" name="province" style="width: 100%;" >
                                  <option value="">Choose Province</option>
                                  @foreach ($provinces as $province)
                                      <option value="{{$province->province_id}}">{{$province->province_name}}</option>
                                  @endforeach
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Select District</label>
                                <select class="form-control select2bs4" id="districtDropdown" name="district" style="width: 100%;" >
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Select Tehsil</label>
                                <select class="form-control select2bs4" id="tehsilDropdown" name="tehsil" style="width: 100%;" >
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Select City</label>
                                <select class="form-control select2bs4" id="citiesDropdown" name="city" style="width: 100%;" >
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Latitude</label>
                                <input type="text" name="latitude" class="form-control" id="" placeholder="Enter School Latitude" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Longitude</label>
                                <input type="text" name="longitude" class="form-control" id="" placeholder="Enter Longitude" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Location String</label>
                                <input type="text" name="location_string" class="form-control" id="" placeholder="Enter location String">
                              </div>
                        </div>
                      
                    </div>
                    <!-- /.row -->
                  </div>
                <!-- /.card-body -->
            </form>
              </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->

      @if(session('error'))
          <input type="hidden" id="error-message" value="{{ session('error') }}">
      @endif

      @if(session('success'))
          <input type="hidden" id="success-message" value="{{ session('success') }}">
      @endif
@endsection

@section('scripts')
        <script src="{{asset('/assets/plugins/select2/js/select2.full.min.js')}}"></script>
        <script>
                $(function () {
                    //Initialize Select2 Elements
                    $('.select2').select2()

                    //Initialize Select2 Elements
                    $('.select2bs4').select2({
                    theme: 'bootstrap4'
                    })

                    $.ajax({
                        url: '/admin/school/get/school/ajax',
                        type: 'GET',
                        success: function(data) {
                            $('#dynamicSchools').empty();
                            $('#dynamicSchools').append($("<option></option>")
                                    .attr("value", "")
                                    .text("Choose School"));
                            $.each(data, function(index, school) {
                                $('#dynamicSchools').append($("<option></option>")
                                    .attr("value", school.school_id)
                                    .text(school.school_name));
                            });
                        }
                    });

                    $('#provinceDropdown').change(function() {
                          var selectedProvince = $(this).val();

                          if (selectedProvince) {
                              $.ajax({
                                  url: '/admin/school/get/district/ajax/' + selectedProvince,
                                  type: 'GET',
                                  success: function(data) {
                                      $('#districtDropdown').empty();
                                      $('#districtDropdown').append($("<option></option>")
                                              .attr("value", "")
                                              .text("Choose District"));
                                      $.each(data, function(index, district) {
                                          $('#districtDropdown').append($("<option></option>")
                                              .attr("value", district.district_id)
                                              .text(district.district_name));
                                      });
                                  }
                              });
                          } else {
                              $('#districtDropdown').empty();
                          }
                      });

                      $('#districtDropdown').change(function() {
                          var selectedProvince = $(this).val();

                          if (selectedProvince) {
                              $.ajax({
                                  url: '/admin/school/get/tehsil/ajax/' + selectedProvince,
                                  type: 'GET',
                                  success: function(data) {
                                      $('#tehsilDropdown').empty();
                                      $('#tehsilDropdown').append($("<option></option>")
                                              .attr("value", "")
                                              .text("Choose Tehsil"));
                                      $.each(data, function(index, tehsil) {
                                          $('#tehsilDropdown').append($("<option></option>")
                                              .attr("value", tehsil.tehsil_id)
                                              .text(tehsil.tehsil_name));
                                      });
                                  }
                              });
                          } else {
                              $('#tehsilDropdown').empty();
                          }
                      });

                      $('#tehsilDropdown').change(function() {
                          var selectedProvince = $(this).val();

                          if (selectedProvince) {
                              $.ajax({
                                  url: '/admin/school/get/cities/ajax/' + selectedProvince,
                                  type: 'GET',
                                  success: function(data) {
                                      $('#citiesDropdown').empty();
                                      $('#citiesDropdown').append($("<option></option>")
                                              .attr("value", "")
                                              .text("Choose City"));
                                      $.each(data, function(index, cities) {
                                          $('#citiesDropdown').append($("<option></option>")
                                              .attr("value", cities.city_id)
                                              .text(cities.city_name));
                                      });
                                  }
                              });
                          } else {
                              $('#citiesDropdown').empty();
                          }
                      });
                    
                })
        </script>
@endsection