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
            <form action="{{route('federal.board.affiliation.fresh.update' , ['id' => $federal->id])}}" method="post" enctype="multipart/form-data">
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
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">School Name:</label>
                                <input type="text" value="{{$federal->school_name}}" name="school_name" class="outline-none rounded-md w-full h-[35px] px-3 form-control" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter School Name" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">School Address</label>
                                <input type="text" value="{{$federal->address}}" name="address" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter School Address" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Owner Name</label>
                                <input type="text" value="{{$federal->owner_name}}" name="owner_name" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Owner Name" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Owner Phone No.</label>
                                <input type="text" value="{{$federal->owner_contact}}" name="owner_contact" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Owner Phone No." required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">CNIC:</label>
                                <input type="text" name="owner_cnic" value="{{$federal->owner_cnic}}" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Your CNIC" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Qualification</label>
                                <input type="text" name="qualification" value="{{$federal->qualification}}" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Qualification" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Owner Email Address:</label>
                                <input type="email" name="owner_email" value="{{$federal->owner_email}}" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Email ">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Name:</label>
                                <input type="text" value="{{$federal->principal_name}}" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" name="principal_name" placeholder="Enter Principal Name" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Contact/WhatsApp:</label>
                                <input type="text" value="{{$federal->principal_contact}}" name="principal_contact" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Contact:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal CNIC:</label>
                                <input type="text" value="{{$federal->principal_cnic}}" name="principal_cnic" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal CNIC:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Qualification:</label>
                                <input type="text" value="{{$federal->principal_qualification}}" name="principal_qualification" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Qualification:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Email:</label>
                                <input type="email" value="{{$federal->principal_email}}" name="principal_email" class="form-contol outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Email:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Level of School :</label>
                                <input type="text" value="{{$federal->school_level}}" name="school_level" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Level of School:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Gender:</label>
                                <select name="gender" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                    <option value="">Select</option>
                                    <option value="male" {{$federal->gender === 'male' ? 'selected':''}}>Male</option>
                                    <option value="female" {{$federal->gender === 'female' ? 'selected':''}}>Female</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">No of Classrooms :</label>
                                <input type="text" value="{{$federal->no_classrooms}}" name="no_classrooms" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Classrooms:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">No of Wahsrooms :</label>
                                <input type="text" value="{{$federal->no_washrooms}}" name="no_washrooms" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Washrooms:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Total Staff:</label>
                                <input type="text" value="{{$federal->total_staff}}" name="total_staff" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Staff" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Male Staff:</label>
                                <input type="text" value="{{$federal->male_staff}}" name="male_staff" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Male Staff" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Female Staff:</label>
                                <input type="text" value="{{$federal->female_staff}}" name="female_staff" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Male Staff" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Non Teaching Staff:</label>
                                <input type="text" value="{{$federal->nonteaching_staff}}" name="nonteaching_staff" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Non Teaching  Staff" required>
                            </div>
                        </div>


















                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Building:</label>
                            <select name="building" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="rented" {{$federal->building === 'rented' ? 'selected':''}}>Rented</option>
                                <option value="owned" {{$federal->building === 'owned' ? 'selected':''}}>Owned</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Class/Grade:</label>
                            <input type="text" value="{{$federal->class}}" name="class" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Class" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Fee:</label>
                            <input type="text" value="{{$federal->fee}}" name="fee" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Fee" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Boys:</label>
                            <input type="text" value="{{$federal->boys}}" name="boys" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Boys " required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Girls:</label>
                            <input type="text" value="{{$federal->girls}}" name="girls" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Girls " required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total Students:</label>
                            <input type="text" value="{{$federal->total_students}}" name="total_students" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Students " required>
                        </div class="col-md-3">

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Teacher Name:</label>
                            <input type="text" value="{{$federal->teacher_name}}" name="teacher_name" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Teacher Name" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Teacher CNIC:</label>
                            <input type="text" value="{{$federal->teacher_cnic}}" name="teacher_cnic" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Teacher Cnic" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Teacher Qualification:</label>
                            <input type="text" value="{{$federal->teacher_qualification}}" name="teacher_qualification" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Teacher Qualification" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Teacher Subject:</label>
                            <input type="text" value="{{$federal->teacher_subject}}" name="teacher_subject" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Teacher subject" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Teacher Salary:</label>
                            <input type="text" value="{{$federal->teacher_salary}}" name="teacher_salary" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Teacher Salary" required>
                        </div>

                        <!-- <div class="col-md-3 mt-3">
                            <label for="" class="text-sm font-semibold">Registration letter/ E-license:</label>
                            <input type="file" accept="image/*" class="form-control-file" value="{{$federal->registration_letter}}" name="registration_letter" placeholder="" required>
                            <img src="{{asset('storage/'.$federal->registration_letter)}}" style="object-fit: cover;" width="100px" height="100px" alt="Registration Lettere Image">
                        </div>

                        <div class="col-md-3 mt-3">
                            <label for="" class="text-sm font-semibold">Map of Building:</label>
                            <input type="file" accept="image/*" class="form-control-file" name="building_map" placeholder="" required>
                            <img src="{{ asset('storage/'.$federal->building_map) }}" style="object-fit: cover;" width="100px" height="100px" alt="Expired License Image abc">
                        </div>

                        <div class="col-md-3 mt-3">
                            <label for="" class="text-sm font-semibold">Valid Rent Agreement:</label>
                            <input type="file" accept="image/*" class="form-control-file" name="rent_agreement" placeholder="" required>
                            <img src="{{ asset('storage/'.$federal->rent_agreement) }}" style="object-fit: cover;" width="100px" height="100px" alt="Expired License Image abc">
                        </div>

                        <div class="col-md-3 mt-3">
                            <label for="" class="text-sm font-semibold">Staff statement with CNIC numbers including Librarian and Physical Training Instructor:</label>
                            <input type="file" accept="image/*" class="form-control-file" name="staff_statement" placeholder="" required>
                            <img src="{{ asset('storage/'.$federal->staff_statement) }}" style="object-fit: cover;" width="100px" height="100px" alt="Expired License Image abc">
                        </div>

                        <div class="col-md-3 mt-3">
                            <label for="" class="text-sm font-semibold"> Owner CNIC copy:</label>
                            <input type="file" accept="image/*" class="form-control-file" name="owner_cnic_image" placeholder="" required>
                            <img src="{{ asset('storage/'.$federal->owner_cnic_image) }}" style="object-fit: cover;" width="100px" height="100px" alt="Expired License Image abc">
                        </div>

                        <div class="col-md-3 mt-3">
                            <label for="" class="text-sm font-semibold">Contact Number:</label>
                            <input type="file" accept="image/*" class="form-control-file" name="contact_number_image" placeholder="" required>
                            <img src="{{ asset('storage/'.$federal->contact_number_image) }}" style="object-fit: cover;" width="100px" height="100px" alt="Expired License Image abc">
                        </div>

                        <div class="col-md-3 mt-3">
                            <label for="" class="text-sm font-semibold">Email Address:</label>
                            <input type="file" accept="image/*" class="form-control-file" name="email_address_image" placeholder="" required>
                            <img src="{{ asset('storage/'.$federal->email_address_image) }}" style="object-fit: cover;" width="100px" height="100px" alt="Expired License Image abc">
                        </div>

                        <div class="col-md-3 mt-3">
                            <label for="" class="text-sm font-semibold">Certificate of Registered Society:</label>
                            <input type="file" accept="image/*" class="form-control-file" name="registered_certificate_image" placeholder="" required>
                            <img src="{{ asset('storage/'.$federal->registered_certificate_image) }}" style="object-fit: cover;" width="100px" height="100px" alt="Expired License Image abc">
                        </div> -->

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
