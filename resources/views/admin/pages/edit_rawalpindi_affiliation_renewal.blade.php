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
            <form action="{{route('rawalpindi.board.affiliation.renewal.update' , ['id' => $rawalpindi->id])}}" method="post" enctype="multipart/form-data">
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
                            <label for="" class="text-sm font-semibold">School Name:</label>
                            <input type="text" value="{{$rawalpindi->schoolname}}" name="schoolname" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Type" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Address:</label>
                            <input type="text" value="{{$rawalpindi->address}}" name="address" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Address" required>
                        </div>


                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Owner Name:</label>
                            <input type="text" value="{{$rawalpindi->ownername}}" name="ownername" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Name" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Owner Contact:</label>
                            <input type="text" value="{{$rawalpindi->ownercontact}}" name="ownercontact" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Contact" required>
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
                            <input type="email" value="{{$rawalpindi->owneremail}}" name="owneremail" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Email" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal Name:</label>
                            <input type="text" value="{{$rawalpindi->principalname}}" name="principalname" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Name" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal Contact:</label>
                            <input type="text" value="{{$rawalpindi->principalcontact}}" name="principalcontact" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Contact" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal Cnic:</label>
                            <input type="text" value="{{$rawalpindi->principalcnic}}" name="principalcnic" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Cnic" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal Qualification:</label>
                            <input type="text" value="{{$rawalpindi->principalqualification}}" name="principalqualification" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Qualification" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Principal Email:</label>
                            <input type="email" value="{{$rawalpindi->principalemail}}" name="principalemail" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Email" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Level of School:</label>
                            <input type="text" value="{{$rawalpindi->schoollevel}}" name="schoollevel" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Level of School" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Gender:</label>
                            <select name="gender" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{$rawalpindi->gender === 'male' ? 'selected':''}}>Male</option>
                                <option value="female" {{$rawalpindi->gender === 'female' ? 'selected':''}}>Female</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of ClassRooms:</label>
                            <input type="text" value="{{$rawalpindi->noclassrooms}}" name="noclassrooms" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of School" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Washrooms:</label>
                            <input type="text" value="{{$rawalpindi->nowashrooms}}" name="nowashrooms" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Washrooms" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total Staff:</label>
                            <input type="text" value="{{$rawalpindi->total_staff}}" name="total_staff" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Staff" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Male Staff:</label>
                            <input type="text" value="{{$rawalpindi->malestaff}}" name="malestaff" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Male Staff" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">FeMale Staff:</label>
                            <input type="text" value="{{$rawalpindi->femalestaff}}" name="femalestaff" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter FeMale Staff" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Non Teaching Staff:</label>
                            <input type="text" value="{{$rawalpindi->nonteachingstaff}}" name="nonteachingstaff" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Non Teaching  Staff" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Building:</label>
                            <select name="building" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="rented" {{$rawalpindi->building === 'rented' ? 'selected':''}}>Rented</option>
                                <option value="owned" {{$rawalpindi->building === 'owned' ? 'selected':''}}>Owned</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Class/Grade:</label>
                            <input type="text" value="{{$rawalpindi->class}}" name="class" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Class" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Fee:</label>
                            <input type="text" value="{{$rawalpindi->fee}}" name="fee" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Fee" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Boys:</label>
                            <input type="text" value="{{$rawalpindi->boys}}" name="boys" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Boys " required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Girls:</label>
                            <input type="text" value="{{$rawalpindi->girls}}" name="girls" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Girls " required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total Students:</label>
                            <input type="text" value="{{$rawalpindi->totalstudents}}" name="totalstudents" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Students " required>
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
