@extends('admin.layout')

@section('styles')
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
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
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form action="{{route('admin.school.update',$school->sc_br_id)}}" method="post">
                  @csrf
                <div class="card-header">
                  <h3 class="card-title">Edit School Details</h3>
      
                  <div class="card-tools">
                    <button type="submit" class="btn btn-primary">
                        Update
                      </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">School Name</label>
                                <input type="text" name="" class="form-control" id="" value="{{$school->school_name}}" required disabled>
                                <input type="hidden" name="school_name" class="form-control" id="" value="{{$school->fk_school_id}}" required>
                              </div>
                          </div>
  
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Branch Name</label>
                            <input type="text" name="branch_name" class="form-control" id="" value="{{$school->sc_br_name}}"  required>
                          </div>
                      </div>
  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">School Address</label>
                                <input type="text" name="school_address" class="form-control" id="" value="{{$school->sc_br_address}}" required>
                              </div>
                        </div>
  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School status</label>
                                <select class="form-control select2bs4" name="school_status" style="width: 100%" required>
                                    <option value="2" {{ $school->sc_br_status == 2 ? 'selected' : '' }}>Un-Registered</option>
                                    <option value="1" {{ $school->sc_br_status == 1 ? 'selected' : '' }}>Registered</option>
                                    <option value="3" {{ $school->sc_br_status == 3 ? 'selected' : '' }}>Under Progress</option>
                                </select>
                            </div>
                        </div>
                        
                        

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">No of Boys</label>
                                <input type="text" name="no_of_boys" class="form-control" id="" value="{{$school->no_of_boys}}" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">No of Girls</label>
                                <input type="text" name="no_of_girls" class="form-control" id="" value="{{$school->no_of_girls}}" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Covered Area</label>
                                <input type="text" name="covered_area" class="form-control" id="" value="{{$school->sc_br_covered_area}}"  required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">No of Teachers</label>
                                <input type="text" name="no_of_teachers" class="form-control" id="" value="{{$school->no_of_teachers}}" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School Type</label>
                                <select class="form-control select2bs4" name="school_type" style="width: 100%;" required>
                                  <option value="boys" {{ $school->sc_br_type == "boys" ? 'selected' : '' }}>Boys</option>
                                  <option value="girls" {{ $school->sc_br_type == "girls" ? 'selected' : '' }}>Girls</option>
                                  <option value="combined" {{ $school->sc_br_type == "combined" ? 'selected' : '' }}>Co-education</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Instruction Medium</label>
                                <select class="form-control select2bs4" name="instruction_medium" style="width: 100%;" required>
                                  <option value="english" {{ $school->instruction_medium == "english" ? 'selected' : '' }}>English</option>
                                  <option value="urdu" {{ $school->instruction_medium == "urdu" ? 'selected' : '' }}>Urdu</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School Level</label>
                                <select class="form-control select2bs4" name="school_level" style="width: 100%;" required>
                                  <option value="primary" {{ $school->sc_br_level == "primary" ? 'selected' : '' }}>Primary</option>
                                  <option value="middle" {{ $school->sc_br_level == "middle" ? 'selected' : '' }}>Elementary</option>
                                  <option value="secondary" {{ $school->sc_br_level == "secondary" ? 'selected' : '' }}>Secondary</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School Affiliated with</label>
                                <select class="form-control" name="school_affiliated" style="width: 100%;" required>
                                  <option value="BISE" {{ $school->sc_br_affiliated == "BISE" ? 'selected' : '' }}>BISE (Rawalpindi)</option>
                                  <option value="FBISE" {{ $school->sc_br_affiliated == "FBISE" ? 'selected' : '' }}>FBISE</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Owner Name</label>
                                <input type="text" name="owner_name" class="form-control" id="" value="{{$school->owner_name}}" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Owner Phone No</label>
                                <input type="text" name="owner_ph_no" class="form-control" id="" value="{{$school->owner_phone}}" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Owner Email</label>
                                <input type="email" name="owner_email" class="form-control" id="" value="{{$school->owner_email}}" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Principal Name</label>
                                <input type="text" name="principal_name" class="form-control" id="" value="{{$school->principal_name}}" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Principal Phone No</label>
                                <input type="text" name="principal_ph_no" class="form-control" id="" value="{{$school->principal_phone}}" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Principal Email</label>
                                <input type="email" name="principal_email" class="form-control" id="" value="{{$school->principal_email}}" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Select Province</label>
                                <select class="form-control select2bs4" id="provinceDropdown" name="province" style="width: 100%;" required>
                                  <option value="">Choose Province</option>
                                  @foreach ($provinces as $province)
                                      <option value="{{$province->province_id}}" {{ $school->fk_province_id == $province->province_id ? 'selected' : '' }}>{{$province->province_name}}</option>
                                  @endforeach
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Select District</label>
                                <select class="form-control select2bs4" id="districtDropdown" name="district" style="width: 100%;" required>
                                    <option value="{{$school->district_id}}">{{$school->district_name}}</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Select Tehsil</label>
                                <select class="form-control select2bs4" id="tehsilDropdown" name="tehsil" style="width: 100%;" required>
                                    <option value="{{$school->tehsil_id}}">{{$school->tehsil_name}}</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Select City</label>
                                <select class="form-control select2bs4" id="citiesDropdown" name="city" style="width: 100%;" required>
                                    <option value="{{$school->city_id}}">{{$school->city_name}}</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Latitude</label>
                                <input type="text" name="latitude" class="form-control" id="" value="{{$school->latitude}}" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Longitude</label>
                                <input type="text" name="longitude" class="form-control" id="" value="{{$school->longitude}}" required>
                              </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Location String</label>
                                <input type="text" name="location_string" class="form-control" id="" value="{{$school->location_string}}">
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

      <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div id="map" style="width: 100%; height: 300px;"></div>
            </div>
        </div>
      </div>

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

                var map = L.map('map');
                var userLocationMarker;
                var specifiedLocationMarker;

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                
                navigator.geolocation.getCurrentPosition(function (position) {
                    var userLat = position.coords.latitude;
                    var userLng = position.coords.longitude;
                    var userLocation = L.latLng(userLat, userLng);
                    userLocationMarker = L.marker(userLocation).addTo(map).bindPopup('Your Location');

                    var specifiedLat = {{$school->latitude}}; 
                    var specifiedLng = {{$school->longitude}}; 
                    var specifiedLocation = L.latLng(specifiedLat, specifiedLng);
                    specifiedLocationMarker = L.marker(specifiedLocation).addTo(map).bindPopup('Specified Location');

                    var distance = userLocation.distanceTo(specifiedLocation) / 1000;

                    var polyline = L.polyline([userLocation, specifiedLocation], { color: 'blue' }).addTo(map);

                    var bounds = L.latLngBounds(userLocation, specifiedLocation);
                    
                    map.fitBounds(bounds);

                    polyline.bindPopup('Distance: ' + distance.toFixed(2) + ' km').openPopup();
                });
        </script>
@endsection