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
            <form action="{{route('federal.board.affiliation.renewal.update' , ['id' => $federal->id])}}" method="post" enctype="multipart/form-data">
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
                                <input type="text" value="{{$federal->schoolname}}" name="schoolname" class="outline-none rounded-md w-full h-[35px] px-3 form-control" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter School Name" required>
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
                                <input type="text" value="{{$federal->ownername}}" name="ownername" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Owner Name" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Owner Phone No.</label>
                                <input type="text" value="{{$federal->ownercontact}}" name="ownercontact" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Owner Phone No." required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">CNIC:</label>
                                <input type="text" name="cnic" value="{{$federal->cnic}}" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Your CNIC" required>
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
                                <input type="email" name="owneremail" value="{{$federal->owneremail}}" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Email ">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Name:</label>
                                <input type="text" value="{{$federal->principalname}}" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" name="principalname" placeholder="Enter Principal Name" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Contact/WhatsApp:</label>
                                <input type="text" value="{{$federal->principalcontact}}" name="principalcontact" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Contact:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal CNIC:</label>
                                <input type="text" value="{{$federal->principalcnic}}" name="principalcnic" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal CNIC:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Qualification:</label>
                                <input type="text" value="{{$federal->principalqualification}}" name="principalqualification" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Qualification:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Email:</label>
                                <input type="email" value="{{$federal->principalemail}}" name="principalemail" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Email:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Level of School :</label>
                                <input type="text" value="{{$federal->schoollevel}}" name="schoollevel" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Level of School:" required>
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
                            <label for="" class="text-sm font-semibold">Institute Code :</label>
                            <input type="text" value="{{$federal->institute_code}}" name="institute_code" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Code:" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Password :</label>
                            <input type="number" value="{{$federal->password}}" name="password" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Code:" required>
                        </div>

                        <!-- <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Previous Affiliation letter Image:</label>
                            <input type="file" accept="image/*" class="form-control-file" name="previous_affiliation" placeholder="">
                            <img src="{{ asset('storage/'.$federal->previous_affiliation)}}" style="object-fit: cover;" width="100px" height="100px" alt="Expired License Image abc">

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
