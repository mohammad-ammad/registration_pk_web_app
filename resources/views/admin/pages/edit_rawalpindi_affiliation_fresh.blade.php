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
                    <li class="breadcrumb-item active">Manage Affiliations</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <form action="{{route('rawalpindi.board.affiliation.fresh.update' , ['id' => $rawalpindi->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h3 class="card-title">Edit Affiliation Details</h3>

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
                            <label for="" class="text-sm font-semibold">Name of School/Institute:</label>
                            <input type="text" value="{{$rawalpindi->school_name}}" name="school_name" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Type" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Address:</label>
                            <input type="text" value="{{$rawalpindi->address}}" name="address" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Address" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">District:</label>
                            <!-- <input type="text" name="district" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter District" required> -->
                            <select name="district" id="districtDropdown" class="form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                @foreach ($districts as $district)
                                <option value="">Select choice </option>
                                <option value="{{$district->district_name}}" {{$rawalpindi->district === $district->district_name ? 'selected':''}}>{{$district->district_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Tehsil:</label>

                            <select name="tehsil" id="districtDropdown" class="form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                @foreach ($tehsils as $tehsil)
                                <option value="{{$tehsil->tehsil_name}}"{{$rawalpindi->tehsil === $tehsil->tehsil_name ? 'selected':''}}>{{$tehsil->tehsil_name}}</option>
                                @endforeach
                            </select>
                        </div>







                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">School Registartion No:</label>
                            <input type="text" value="{{$rawalpindi->reg_no}}" name="reg_no" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Registartion No" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Contact:</label>
                            <input type="text" value="{{$rawalpindi->contact}}" name="contact" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Contact ">
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Owner Name:</label>
                            <input type="text" value="{{$rawalpindi->owner_name}}" name="owner_name" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Name" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Owner Contact:</label>
                            <input type="text" value="{{$rawalpindi->owner_contact}}" name="owner_contact" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Contact" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Cnic:</label>
                            <input type="text" value="{{$rawalpindi->cnic}}" name="cnic" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Cnic" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Qualification:</label>
                            <input type="text" value="{{$rawalpindi->qualification}}" name="qualification" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter qualification" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Owner Email Aaddress:</label>
                            <input type="email" value="{{$rawalpindi->owner_email_address}}" name="owner_email_address" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Email" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal Name:</label>
                            <input type="text" value="{{$rawalpindi->principal_name}}" name="principal_name" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Name" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal Contact:</label>
                            <input type="text" value="{{$rawalpindi->principal_contact}}" name="principal_contact" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Contact" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal Cnic:</label>
                            <input type="text" value="{{$rawalpindi->principal_cnic}}" name="principal_cnic" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Cnic" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal Qualification:</label>
                            <input type="text" value="{{$rawalpindi->principal_qualification}}" name="principal_qualification" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Qualification" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal Email:</label>
                            <input type="email" value="{{$rawalpindi->principal_email}}" name="principal_email" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Email" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Level of School:</label>
                            <input type="text" value="{{$rawalpindi->school_level}}" name="school_level" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Level of School" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Gender:</label>
                            <select name="gender" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select Gender</option>
                                <option value="Male"{{$rawalpindi->gender === 'Male' ? 'selected':''}}>Male</option>
                                <option value="Female" {{$rawalpindi->gender === 'Female' ? 'selected':''}}>Female</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of ClassRooms:</label>
                            <input type="text" value="{{$rawalpindi->classrooms_no}}" name="classrooms_no" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of School" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Washrooms:</label>
                            <input type="text" value="{{$rawalpindi->washrooms_no}}" name="washrooms_no" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Washrooms" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total Staff:</label>
                            <input type="text" value="{{$rawalpindi->total_staff}}" name="total_staff" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Staff" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Male Staff:</label>
                            <input type="text" value="{{$rawalpindi->male_staff}}" name="male_staff" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Male Staff" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">FeMale Staff:</label>
                            <input type="text" value="{{$rawalpindi->female_staff}}" name="female_staff" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter FeMale Staff" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Non Teaching Staff:</label>
                            <input type="text" value="{{$rawalpindi->non_teaching_staff}}" name="non_teaching_staff" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Non Teaching  Staff" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Building:</label>
                            <select name="building" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="reuted"{{$rawalpindi->building === 'reuted' ? 'selected':''}}>Reuted</option>
                                <option value="owned"{{$rawalpindi->building === 'owned' ? 'selected':''}}>Owned</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">PlayGround:</label>
                            <select name="playground" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="available"{{$rawalpindi->playground === 'available' ? 'selected':''}}>Available</option>
                                <option value="not"{{$rawalpindi->playground === 'not' ? 'selected':''}}>Not</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Laboratories:</label>
                            <select name="laboratories" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="physics"{{$rawalpindi->laboratories === 'physics' ? 'selected':''}}>Physics</option>
                                <option value="chemistry"{{$rawalpindi->laboratories === 'chemistry' ? 'selected':''}}>Chemistry</option>
                                <option value="biology"{{$rawalpindi->laboratories === 'biology' ? 'selected':''}}>Biology</option>
                                <option value="computer"{{$rawalpindi->laboratories === 'computer' ? 'selected':''}}>Computer</option>
                                <option value="nill"{{$rawalpindi->laboratories === 'nill' ? 'selected':''}}>None</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Is Lab Attendent Available :</label>
                            <select name="lab_attendent" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="yes"{{$rawalpindi->lab_attendent === 'yes' ? 'selected':''}}>Yes</option>
                                <option value="no"{{$rawalpindi->lab_attendent === 'no' ? 'selected':''}}>No</option>


                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">For which group to be affiliated:</label>
                            <select name="which_group_affiliated" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="science"{{$rawalpindi->which_group_affiliated === 'science' ? 'selected':''}}>Science</option>
                                <option value="arts"{{$rawalpindi->which_group_affiliated === 'arts' ? 'selected':''}}>Arts</option>
                                <option value="general science"{{$rawalpindi->which_group_affiliated === 'general science' ? 'selected':''}}>General Science</option>
                                <option value="humanities"{{$rawalpindi->which_group_affiliated === 'humanities' ? 'selected':''}}>Humanities</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Does Institute have registered body:</label>
                            <select name="registered_body" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="trust"{{$rawalpindi->registered_body === 'trust' ? 'selected':''}}>Trust</option>
                                <option value="soceity"{{$rawalpindi->registered_body === 'soceity' ? 'selected':''}}>Soceity</option>
                                <option value="ngo"{{$rawalpindi->registered_body === 'ngo' ? 'selected':''}}>NGO</option>
                                <option value="corporate_body"{{$rawalpindi->registered_body === 'corporate_body' ? 'selected':''}}>Corporate Body </option>
                                <option value="nil"{{$rawalpindi->registered_body === 'nil' ? 'selected':''}}>None </option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Does Institute run by an:</label>
                            <select name="institute_run" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="individual"{{$rawalpindi->institute_run === 'individual' ? 'selected':''}}>Individual</option>
                                <option value="franchise"{{$rawalpindi->institute_run === 'franchise' ? 'selected':''}}>Franchise</option>
                                <option value="nil"{{$rawalpindi->institute_run === 'nil' ? 'selected':''}}>None </option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Does Institute have sufficient budget for smooth running for six months:</label>
                            <select name="sufficient_budget" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="yes"{{$rawalpindi->sufficient_budget === 'yes' ? 'selected':''}}>yes</option>
                                <option value="no"{{$rawalpindi->sufficient_budget === 'no' ? 'selected':''}}>no</option>

                            </select>
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
