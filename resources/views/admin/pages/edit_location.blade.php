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
      <!-- /.content-header -->

      <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
              <form action="{{ route('admin.location.update.province', $province->province_id) }}" method="post">
                @method('put');
                  @csrf
                <div class="card-header">
                  <h3 class="card-title">Edit Province</h3>
      
                  <div class="card-tools">
                    <button type="submit" class="btn btn-primary">
                      update
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display:flex; justify-content:center; align-items: center">
                    <div class="form-group" style="width:40%; ">
                        <label for="">Province Name</label>
                        <input type="text" value="{{$province->province_name}}" name="province_name" class="form-control" id="" placeholder="Enter Province Name" value="" required>
                      </div>
                </div>
            </form>
              </div>
        </div><!-- /.container-fluid -->
      </div>

      <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form action="{{route('admin.location.update.district' , $district->district_id)}}" method="post">
                  @csrf
                  <div class="card-header">
                    <h3 class="card-title">Edit Destrict</h3>
        
                    <div class="card-tools">
                      <button type="submit" class="btn btn-primary">
                         update
                      </button>
                    </div>
                  </div>
                <!-- /.card-header -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body" style="display:flex; justify-content:center; align-items: center">
                            <div class="form-group" style="width:100%; ">
                                <label for="">Select Province</label>
                                <select class="form-control select2bs4" name="province_id" id="" style="width: 100%;" required>
                                    <option value="">Choose Province</option>
                                        @foreach ($provinces as $provincess)
                                            <option value="{{$provincess->province_id}}" {{ $provincess->province_id == $provincess->province_id ? 'selected' : '' }}>{{$provincess->province_name}}</option>
                                        @endforeach                  
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body" style="display:flex; justify-content:center; align-items: center">
                            <div class="form-group" style="width:100%; ">
                                <label for="">District Name</label>
                                <input type="text" value="{{$district->district_name}}" name="district_name" class="form-control" id="" placeholder="Enter District Name">
                              </div>
                        </div>
                    </div>
                </div>
                
            </form>
              </div>
        </div><!-- /.container-fluid -->
      </div>

      <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form action="{{route('admin.location.update.tehsil' , $tehsil->tehsil_id)}}" method="post">
                  @csrf
                <div class="card-header">
                  <h3 class="card-title">Edit Tehsil</h3>
      
                  <div class="card-tools">
                    <button type="submit" class="btn btn-primary">
                       update
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body" style="display:flex; justify-content:center; align-items: center">
                            <div class="form-group" style="width:100%; ">
                                <label for="">Select District</label>
                                <select class="form-control select2bs4" name="district_id" id="" style="width: 100%;" required>
                                    <option value="">Choose District</option>
                                        @foreach ($districts as $districtss)
                                            <option value="{{$districtss->district_id}}" {{ $districtss->province_id == $districtss->province_id ? 'selected' : '' }}>{{$districtss->district_name}}</option>
                                        @endforeach                  
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body" style="display:flex; justify-content:center; align-items: center">
                            <div class="form-group" style="width:100%; ">
                                <label for="">Tehsil Name</label>
                                <input type="text" value="{{$tehsil->tehsil_name}}" name="tehsil_name" class="form-control" id="" >
                              </div>
                        </div>
                    </div>
                </div>
                
            </form>
              </div>
        </div><!-- /.container-fluid -->
      </div>

       <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form action="{{route('admin.location.update.city' , $city->city_id)}}" method="post">
                  @csrf
                <div class="card-header">
                  <h3 class="card-title">Edit City</h3>
      
                  <div class="card-tools">
                    <button type="submit" class="btn btn-primary">
                       update
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body" style="display:flex; justify-content:center; align-items: center">
                            <div class="form-group" style="width:100%; ">
                                <label for="">Select Tehsil</label>
                                <select class="form-control select2bs4" name="tehsil_id" id="" style="width: 100%;">
                                    <option value="">Choose Tehsil</option>
                                    @foreach ($tehsils as $tehsilss)
                                      <option value="{{$tehsilss->tehsil_id}}" {{ $tehsilss->district_id == $tehsilss->district_id ? 'selected' : '' }}>{{$tehsilss->tehsil_name}}</option>
                                    @endforeach                   
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body" style="display:flex; justify-content:center; align-items: center">
                            <div class="form-group" style="width:100%; ">
                                <label for="">City Name</label>
                                <input type="text" value="{{$city->city_name}}" name="city_name" class="form-control" id="" >
                              </div>
                        </div>
                    </div>
                </div>
                
            </form>
              </div>
        </div><!-- /.container-fluid -->
      </div>

       <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form action="{{route('admin.location.update.area', $area->area_id)}}" method="post">
                  @csrf
                <div class="card-header">
                  <h3 class="card-title">Edit Area</h3>
      
                  <div class="card-tools">
                    <button type="submit" class="btn btn-primary">
                     update
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body" style="display:flex; justify-content:center; align-items: center">
                            <div class="form-group" style="width:100%; ">
                                <label for="">Select City</label>
                                <select class="form-control select2bs4" name="city_id" id="" style="width: 100%;" required>
                                    <option value="">Choose City</option>
                                    @foreach ($cities as $citiess)
                                      <option value="{{$citiess->city_id}}" {{ $citiess->tehsil_id == $citiess->tehsil_id ? 'selected' : '' }}>{{$citiess->city_name}}</option>
                                    @endforeach                   
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body" style="display:flex; justify-content:center; align-items: center">
                            <div class="form-group" style="width:100%; ">
                                <label for="">Area Name</label>
                                <input type="text" value="{{$area->area_name}}" name="area_name" class="form-control" id="" >
                              </div>
                        </div>
                    </div>
                </div>
                
            </form>
              </div>
        </div><!-- /.container-fluid -->
      </div>

       <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form action="{{route('admin.location.update.subarea', $subarea->subarea_id)}}" method="post">
                  @csrf
                <div class="card-header">
                  <h3 class="card-title">Edit SubArea</h3>
      
                  <div class="card-tools">
                    <button type="submit" class="btn btn-primary">
                       update
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body" style="display:flex; justify-content:center; align-items: center">
                            <div class="form-group" style="width:100%; ">
                                <label for="">Select Area</label>
                                <select class="form-control select2bs4" name="area_id" id="" style="width: 100%;" required>
                                    <option value="">Choose Area</option>
                                    @foreach ($areas as $areass)
                                    <option value="{{$areass->area_id}}" {{ $areass->city_id == $areass->city_id ? 'selected' : '' }}>{{$areass->area_name}}</option>
                                  @endforeach                  
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body" style="display:flex; justify-content:center; align-items: center">
                            <div class="form-group" style="width:100%; ">
                                <label for="">Sub-Area Name</label>
                                <input type="text" value="{{$subarea->subarea_name}}" name="subarea_name" class="form-control" id="" >
                              </div>
                        </div>
                    </div>
                </div>
                
            </form>
              </div>
        </div><!-- /.container-fluid -->
      </div> 
      
     
  
      <!-- Main content -->
      
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

                })
        </script>
@endsection