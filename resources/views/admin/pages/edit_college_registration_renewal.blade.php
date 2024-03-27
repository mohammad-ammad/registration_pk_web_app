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
                <h1 class="m-0">Manage College</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage College</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <form action="{{route('get.college.registration.renewal.update' , ['id' => $college->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h3 class="card-title">Edit College Details</h3>

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
                            <label for="" class="text-sm font-semibold">College Name:</label>
                            <input type="text" value="{{$college->college_name}}" name="college_name" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter College Name" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">District Name:</label>
                            <select name="district" id="districtDropdown" class="form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                @foreach ($districts as $district)
                                <option value="{{$district->district_name}}" {{$college->district === $district->district_name ? 'selected':''}}>{{$district->district_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Tehsil Name:</label>
                            <select name="tehsil" id="districtDropdown" class="form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                @foreach ($tehsils as $tehsil)
                                <option value="{{$tehsil->tehsil_name}}" {{$college->tehsil === $tehsil->tehsil_name ? 'selected':''}}>{{$tehsil->tehsil_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Uc No:</label>
                            <input type="text" value="{{$college->uc_no}}" name="uc_no" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="UC NO." required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Na No:</label>
                            <input type="text" value="{{$college->na_no}}" name="na_no" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="NA NO." required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">PP No:</label>
                            <input type="text" value="{{$college->pp_no}}" name="pp_no" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="PP NO." required>
                        </div>


                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Registered Gender:</label>
                            <select name="gender" id="" class="form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="male" {{$college->gender === 'male' ? 'selected':''}}>Male</option>
                                <option value="female" {{$college->gender === 'female' ? 'selected':''}}>Female</option>
                            </select>
                        </div>




                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Gender Studying:</label>
                            <input type="text" value="{{$college->gender_studying}}" name="gender_studying" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Gender Studying." required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Location:</label>
                            <input type="text" value="{{$college->location}}" name="location" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Location." required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Shift:</label>
                            <select name="shift" id="" class="select2bs4  form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="morning" {{$college->shift === 'morning' ?'selected':''}}>Morning</option>
                                <option value="evening" {{$college->shift === 'evening' ? 'selected':''}}>Evening</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Establishment Year</label>
                            <input type="text" value="{{$college->establishment_year}}" name="establishment_year" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Establishment Year" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">College Address</label>
                            <input type="text" value="{{$college->college_address}}" name="college_address" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter College Address">
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">College Type:</label>
                            <select name="college_type" id="" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="general" {{$college->college_type === 'general' ? 'selected':''}}>General</option>
                                <option value="trust" {{$college->college_type === 'trust' ? 'selected':''}}>Trust</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">College Email:</label>
                            <input type="email" value="{{$college->college_email}}" name="college_email" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="College Email" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Private Registration Expiry Date:</label>
                            <input type="date" value="{{$college->registration_expiry_date}}" name="registration_expiry_date" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Registration Expiry Date:" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">College Contact No:</label>
                            <input type="text" value="{{$college->college_contact_no}}" name="college_contact_no" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="College Contact No " required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Owner Name:</label>
                            <input type="text" value="{{$college->owner_name}}" name="owner_name" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Name" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Owner No:</label>
                            <input type="text" name="owner_no" value="{{$college->owner_no}}" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner No" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Owner Cnic(without dashes):</label>
                            <input type="number" value="{{$college->owner_cnic}}" name="owner_cnic" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner CNIC" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal Name:</label>
                            <input type="text" value="{{$college->principal_name}}" name="principal_name" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Name" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal No:</label>
                            <input type="text" name="principal_no" value="{{$college->principal_no}}" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal No" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal Cnic(without dashes):</label>
                            <input type="number" name="principal_cnic" value="{{$college->principal_cnic}}" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal CNIC" required>
                        </div>


                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Nature of Ownership:</label>
                            <input type="text" value="{{$college->ownership_nature}}" name="ownership_nature" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Nature of Ownership" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total Male Teacher:</label>
                            <input type="text" value="{{$college->male_teacher}}" name="male_teacher" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Male Teacher" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total FeMale Teacher:</label>
                            <input type="text" value="{{$college->female_teacher}}" name="female_teacher" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total FeMale Teacher" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">College Stats:</label>
                            <input type="text" value="{{$college->college_stats}}" name="college_stats" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter college Stats " required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Affiliation With University:</label>
                            <input type="text" value="{{$college->university_affiliation}}" name="university_affiliation" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Affiliation With University " required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Affiliation With Board:</label>
                            <input type="text" value="{{$college->board_affiliation}}" name="board_affiliation" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Affiliation With Board " required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total Branches:</label>
                            <input type="text" value="{{$college->total_branches}}" name="total_branches" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Branches" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total Classrooms:</label>
                            <input type="text" value="{{$college->total_classrooms}}" name="total_classrooms" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Classrooms" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total rooms(other than class-rooms):</label>
                            <input type="text" value="{{$college->total_rooms}}" name="total_rooms" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total rooms(other than class-rooms)" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Building Area Type:</label>
                            <input type="text" value="{{$college->building_type}}" name="building_type" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Building Type" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total Area:</label>
                            <input type="text" name="total_area" value="{{$college->total_area}}" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Area" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Library AVailable:</label>
                            <input type="text" name="library_available" value="{{$college->library_available}}" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Library" required>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="text-sm font-semibold">Labs:</label>
                            <input type="checkbox" name="labs[]" value="bio_chemistry" {{ in_array('bio_chemistry', explode(',', $college->labs)) ? 'checked' : '' }}>
                            <label for="bio_chemistry">Bio Chemistry</label>

                            <input type="checkbox" name="labs[]" value="biology" {{ in_array('biology', explode(',', $college->labs)) ? 'checked' : '' }}>
                            <label for="biology">Biology</label>

                            <input type="checkbox" name="labs[]" value="botany" {{ in_array('botany', explode(',', $college->labs)) ? 'checked' : '' }}>
                            <label for="botany">Botany</label>

                            <input type="checkbox" name="labs[]" value="chemistry" {{ in_array('chemistry', explode(',', $college->labs)) ? 'checked' : '' }}>
                            <label for="chemistry_lab">Chemistry </label>

                            <input type="checkbox" name="labs[]" value="physics" {{ in_array('physics', explode(',', $college->labs)) ? 'checked' : '' }}>
                            <label for="physics_lab">Physics</label>

                            <input type="checkbox" name="labs[]" value="Computer_Science" {{ in_array('Computer_science', explode(',', $college->labs)) ? 'checked' : '' }}>
                            <label for="computer_science">Computer Science</label>

                            <input type="checkbox" name="labs[]" value="Inorganic_chemistry" {{ in_array('Inorganic_chemistry', explode(',', $college->labs)) ? 'checked' : '' }}>
                            <label for="">Inorganic Chemistry</label>

                            <input type="checkbox" name="labs[]" value="organic_chemistry" {{ in_array('organic_chemistry', explode(',', $college->labs)) ? 'checked' : '' }}>
                            <label for="">Organic Chemistry</label>

                            <input type="checkbox" name="labs[]" value="zoology" {{ in_array('zoology', explode(',', $college->labs)) ? 'checked' : '' }}>
                            <label for="">Zoology</label>
                        </div>


                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total Computers(P-I & P-II Series):</label>
                            <input type="text" value="{{$college->total_computers_p1_p2_series}}" name="total_computers_p1_p2_series" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Computers(P-I & P-II Series)" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total Computers(P-III Series):</label>
                            <input type="text" value="{{$college->total_computers_p3_series}}" name="total_computers_p3_series" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Computers(P-III Series)" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total Computers (P-IV Series or Higher):</label>
                            <input type="text" value="{{$college->total_computers_p4_series}}" name="total_computers_p4_series" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Computers (P-IV Series or Higher)" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Functional Computers for Teaching(P-I & P-II Series):</label>
                            <input type="text" value="{{$college->functional_computers_p1_p2_series}}" name="functional_computers_p1_p2_series" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Total Number of functional computers used for teaching/learning purposes	" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Functional Computers for Teaching(P-III Series):</label>
                            <input type="text" value="{{$college->functional_computers_p3_series}}" name="functional_computers_p3_series" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Total Number of functional computers used for teaching/learning purposes" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Functional Computers for Teaching(P-IV Series):</label>
                            <input type="text" value="{{$college->functional_computers_p4_series}}" name="functional_computers_p4_series" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Total Number of functional computers used for teaching/learning purposes" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Functional Computers for Administration(P-I & P-II):</label>
                            <input type="text" value="{{$college->admin_computers_p1_p2_series}}" name="admin_computers_p1_p2_series" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Total Number of functional computers used for Administration" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Functional Computers for Administration(P-III Series):</label>
                            <input type="text" value="{{$college->admin_computers_p3_series}}" name="admin_computers_p3_series" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Total Number of functional computers used for Administration" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Functional Computers for Administration(P-Iv Series):</label>
                            <input type="text" value="{{$college->admin_computers_p4_series}}" name="admin_computers_p4_series" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Total Number of functional computers used for Administration" required>
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
