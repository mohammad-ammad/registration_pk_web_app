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
              <h1 class="m-0">Geo Locator</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Geo Locator</li>
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
                <div class="card-header">
                  <h3 class="card-title">No. of schools ({{$sc_count}})</h3>
      
                  <div class="card-tools">
                    <a href="{{route("admin.geolocator")}}" class="btn btn-danger">Reset</a>
                    <button type="button" id="search_map" class="btn btn-primary">Search</button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Select School</label>
                        <select class="form-control select2bs4" id="schoolDropdown" style="width: 100%;">
                          <option>Choose School</option>
                          @foreach ($schools as $school)
                            <option value="{{$school->school_id}}">{{$school->school_name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Select District</label>
                          <select class="form-control select2bs4" id="districtDropdown" style="width: 100%;">
                            <option>Choose District</option>
                            @foreach ($districts as $district)
                            <option value="{{$district->district_id}}">{{$district->district_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Select Tehsil</label>
                          <select class="form-control select2bs4" id="tehsilDropdown" style="width: 100%;">
                            
                          </select>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Select City</label>
                          <select class="form-control select2bs4" id="citiesDropdown" style="width: 100%;">
                          </select>
                        </div>
                      </div>
                    
                  </div>
                  <!-- /.row -->
                </div>
              </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div id="map" style="width: 100%; height: 600px;"></div>
            </div>
        </div>
      </div>
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
               })

               var map = L.map('map').setView([33.6844, 73.0479], 10);
                            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                let schools = []; 
                const currentURL = new URL(window.location.href);
                let _schoolId = null;
                let _districtId = null;
                let _tehsilId = null;
                let _cityId = null;
                
                let _url = '/admin/geolocator/map/ajax';
                if (currentURL.searchParams.has('school_id')) {
                    _schoolId = currentURL.searchParams.get('school_id');
                }
                if (currentURL.searchParams.has('district_id')) {
                  _districtId = currentURL.searchParams.get('district_id');
                }
                if (currentURL.searchParams.has('tehsil_id')) {
                  _tehsilId = currentURL.searchParams.get('tehsil_id');
                }
                if (currentURL.searchParams.has('cities_id')) {
                  _cityId = currentURL.searchParams.get('cities_id');
                }
                
                if(_schoolId !== null && _districtId !== null && _tehsilId !== null && _cityId !== null)
                {
                  _url = `/admin/geolocator/map/ajax?school_id=${_schoolId}&district_id=${_districtId}&tehsil_id=${_tehsilId}&cities_id=${_cityId}`;
                }
                
                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(data) {
                        data.forEach(function(schoolData) {
                            var status = parseInt(schoolData.sc_br_status);
                            var iconColor;

                            if (status === 1) {
                                iconColor = 'green';
                            } else if (status === 2) {
                                iconColor = 'red';
                            } else if (status === 3) {
                                iconColor = 'yellow';
                            } else {
                                iconColor = 'blue';
                            }

                            
                            var customIcon = L.icon({
                                iconUrl: '{{ asset("/assets/dist/img") }}/' + iconColor + '_pin.png',
                                iconSize: [25, 41], 
                                iconAnchor: [12, 41],
                            });

                            var school = {
                                name: schoolData.school_name,
                                city: schoolData.city_name,
                                latlng: [parseFloat(schoolData.latitude), parseFloat(schoolData.longitude)],
                                moreInfoURL: `/admin/school/${schoolData.sc_br_id}`,
                                icon: customIcon 
                            };

                            schools.push(school);
                        });

                        schools.forEach(function(school) {
                            var marker = L.marker(school.latlng, { icon: school.icon }).addTo(map);

                            var popupContent = `
                                <strong>${school.name}</strong><br>
                                <p>${school.city}</p>
                                <a href="${school.moreInfoURL}">Click for More Info</a>
                            `;

                            marker.bindPopup(popupContent);
                        });
                    }
                });

                $('#search_map').click(function(){
                  const school_id = $('#schoolDropdown').val();
                  const district_id = $('#districtDropdown').val();
                  const tehsil_id = $('#tehsilDropdown').val();
                  const cities_id = $('#citiesDropdown').val();
                  
                  if (!school_id || !district_id || !tehsil_id || !cities_id) {
                    toastr.error("Please select values for all fields");
                  } else {
                    
                    currentURL.searchParams.set('school_id', school_id);
                    currentURL.searchParams.set('district_id', district_id);
                    currentURL.searchParams.set('tehsil_id', tehsil_id);
                    currentURL.searchParams.set('cities_id', cities_id);

                    const updatedURL = currentURL.toString();

                    window.location.href = updatedURL;
                  }
                  
                })

                // * multi select dropdown logic
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

        </script>
@endsection