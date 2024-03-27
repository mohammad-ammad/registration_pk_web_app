@extends('admin.layout')

@section('styles')
<link rel="stylesheet" href="{{asset('/assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
    </div>
</div>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <form action="{{route('get.school.registration.fresh.update' , ['id' => $school->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                                <label for="" class="text-sm font-semibold">School Name:</label>
                                <input type="text" value="{{$school->school_name}}" name="school_name" class="outline-none rounded-md w-full h-[35px] px-3 form-control" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter School Name" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Branch Name</label>
                                <input type="text" value="{{$school->branch_name}}" name="branch_name" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Branch Name" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">School Address</label>
                                <input type="text" value="{{$school->school_address}}" name="school_address" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter School Address" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">School Status</label>
                                <select name="school_status" id="" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                    <option value="Un-Registered" {{$school->school_status === 'Un-Registered' ? 'selected':''}}>Un-Registered</option>
                                    <option value="Registered" {{$school->school_status === 'Registered' ? 'selected':''}}>Registered</option>
                                    <option value="Under-Progress" {{$school->school_status === 'Under-Progress' ? 'selected':''}}>Under Progress</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">No of Boys:</label>
                                <input type="text" value="{{$school->no_of_boys}}" name="no_of_boys" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Boys " required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">No of Girls:</label>
                                <input type="text" value="{{$school->no_of_girls}}" name="no_of_girls" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Girls " required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Covered Area</label>
                                <input type="number" value="{{$school->covered_area}}" name="covered_area" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Covered Area" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">No. of Teachers</label>
                                <input type="number" value="{{$school->no_of_teachers}}" name="no_of_teachers" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="No. of Teachers" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">School Type</label>
                                <select name="school_type" id="" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                    <option value="boys" {{$school->school_type === 'boys' ? 'selected':''}}>Boys</option>
                                    <option value="girls" {{$school->school_type === 'girls' ? 'selected':''}}>Girls</option>
                                    <option value="combined" {{$school->school_type === 'combined' ? 'selected':''}}>Co-education</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-sm font-semibold">School Affiliated with</label>
                                <select class="form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" name="school_affiliated" style="width: 100%;" required>
                                    <option value="BISE Rawalpindi" {{$school->school_affiliated === 'BISE Rawalpindi' ? 'selected':''}}>BISE Rawalpindi</option>
                                    <option value="FBISE" {{$school->school_affiliated === 'FBISE' ? 'selected':''}}>FBISE</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Instruction Medium</label>
                                <select name="instruction_medium" id="" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                    <option value="english" {{$school->instruction_medium === 'english' ? 'selected':''}}>English</option>
                                    <option value="urdu" {{$school->instruction_medium === 'urdu' ? 'selected':''}}>Urdu</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">School Level</label>
                                <select name="school_level" id="" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                    <option value="primary" {{$school->school_level === 'primary' ? 'selected':''}}>Primary</option>
                                    <option value="middle" {{$school->school_level === 'middle' ? 'selected':''}}>Elementary</option>
                                    <option value="secondary" {{$school->school_level === 'secondary' ? 'selected':''}}>Secondary</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Owner Name</label>
                                <input type="text" value="{{$school->owner_name}}" name="owner_name" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Owner Name" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Owner Phone No.</label>
                                <input type="text" value="{{$school->owner_ph_no}}" name="owner_ph_no" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Owner Phone No." required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Owner Email</label>
                                <input type="email" value="{{$school->owner_email}}" name="owner_email" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Owner Email" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Name</label>
                                <input type="text" value="{{$school->principal_name}}" name="principal_name" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Principal Name" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Phone No.</label>
                                <input type="text" value="{{$school->principal_ph_no}}" name="principal_ph_no" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Principal Phone No." required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Email</label>
                                <input type="email" value="{{$school->principal_email}}" name="principal_email" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Principal Email" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Email</label>
                                <input type="email" value="{{$school->principal_email}}" name="principal_email" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Principal Email" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Select Province</label>
                                <select name="province_name" id="provinceDropdown" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                    <option value="">Choose Province</option>
                                    @foreach ($provinces as $province)

                                    <option value="{{$province->province_name}}" {{ $school->province_name === $province->province_name ? 'selected' : '' }}>{{$province->province_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Select District</label>
                                <select name="district_name" id="districtDropdown" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                    <option value="">Choose District</option>
                                    @foreach ($districts as $dist)
                                    <option value="{{$dist->district_name}}" {{ $school->district_name === $dist->district_name ? 'selected' : '' }}>{{$dist->district_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Select Tehsil</label>
                                <select name="tehsil_name" id="tehsilDropdown" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                    <option value="">Choose Tehsil</option>
                                    @foreach ($tehsils as $tehsil)
                                    <option value="{{$tehsil->tehsil_name}}" {{ $school->tehsil_name === $tehsil->tehsil_name ? 'selected' : '' }}>{{$tehsil->tehsil_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Select City</label>
                                <select name="city_name" id="citiesDropdown" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                    <option value="">Choose City</option>
                                    @foreach ($cities as $city)
                                    <option value="{{$city->city_name}}" {{ $school->city_name === $city->city_name ? 'selected' : '' }}>{{$city->city_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Latitude</label>
                                <input type="text" value="{{$school->latitude}}" name="latitude" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Latitude" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Longitude</label>
                                <input type="text" value="{{$school->longitude}}" name="longitude" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Longitude">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Location String</label>
                                <input type="text" value="{{$school->location_string}}" name="location_string" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Location String">
                            </div>
                        </div>


                    </div>

                </div>

        </div>

        </form>
    </div>
</div>
</div>




@endsection

@section('scripts')
@if (Session::has('message'))
<script>
    toastr.options = {
        "progressBar": true,
        "closeButton": true,
    }
    toastr.success("{{Session::get('message')}}")
</script>

@endif

@if (Session::has('error'))
<script>
    toastr.options = {
        "progressBar": true,
        "closeButton": true,
    }

    toastr.error("{{Session::get('error')}}")
</script>

@endif


@if (Session::has('captcha_answer'))
<script>
    toastr.options = {
        "progressBar": true,
        "closeButton": true,
    }

    toastr.error("{{Session::get('captcha_answer')}}")
</script>

@endif

@endsection
