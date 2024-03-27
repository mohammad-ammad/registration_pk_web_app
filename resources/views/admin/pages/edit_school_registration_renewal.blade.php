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
            <form action="{{route('get.school.registration.renewal.edit',['id' => $school->id])}}" method="post" enctype="multipart/form-data">
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
                                <input type="text" value="{{$school->schoolname}}" name="schoolname" class="outline-none rounded-md w-full h-[35px] px-3 form-control" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter School Name" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Address:</label>
                                <input type="text" value="{{$school->address}}" name="address" class="outline-none rounded-md w-full h-[35px] px-3 form-control" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter School Name" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Owner Name:</label>
                                <input type="text" value="{{$school->ownername}}" name="ownername" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Name" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Owner Contact:</label>
                                <input type="text" value="{{$school->ownercontact}}" name="ownercontact" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Contact" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">CNIC:</label>
                                <input type="text" value="{{$school->cnic}}" name="cnic" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Your CNIC" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Qualification</label>
                                <input type="text" value="{{$school->qualification}}" name="qualification" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Qualification" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Owner Email Address:</label>
                                <input type="text" value="{{$school->owneremail}}" name="owneremail" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Qualification" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Name:</label>
                                <input type="text" value="{{$school->principalname}}" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" name="principalname" placeholder="Enter Principal Name" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Contact/What's App :</label>
                                <input type="text" value="{{$school->principalcontact}}" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" name="principalcontact" placeholder="Enter Principal Contact" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal CNIC:</label>
                                <input type="text" name="principalcnic" value="{{$school->principalcnic}}" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal CNIC:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Qualification:</label>
                                <input type="text" value="{{$school->principalqualification}}" name="principalqualification" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Qualification:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Principal Email:</label>
                                <input type="email" name="principalemail" value="{{$school->principalemail}}" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Email:" required>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Level of School :</label>
                                <input type="text" value="{{$school->schoollevel}}" name="schoollevel" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Level of School:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Gender:</label>
                                <select name="gender" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                    <option value="">Select</option>
                                    <option value="male" {{$school->gender === 'male' ? 'selected':''}}>Male</option>
                                    <option value="female" {{$school->gender === 'female' ? 'selected':''}}>Female</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">No of Classrooms :</label>
                                <input type="text" value="{{$school->noclassrooms}}" name="noclassrooms" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Classrooms:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">No of Wahsrooms :</label>
                                <input type="text" value="{{$school->nowashrooms}}" name="nowashrooms" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Washrooms:" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Total Staff:</label>
                                <input type="text" value="{{$school->total_staff}}" name="total_staff" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Staff" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Male Staff:</label>
                                <input type="text" value="{{$school->malestaff}}" name="malestaff" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Male Staff" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">FeMale Staff:</label>
                                <input type="text" value="{{$school->femalestaff}}" name="femalestaff" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter FeMale Staff" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Non Teaching Staff:</label>
                                <input type="text" value="{{$school->nonteachingstaff}}" name="nonteachingstaff" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Non Teaching  Staff" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Building:</label>
                                <select name="building" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                    <option value="">Select</option>
                                    <option value="rented" {{$school->building === 'rented' ? 'selected':''}}>Rented</option>
                                    <option value="owned" {{$school->building === 'owned' ? 'selected':''}}>Owned</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Class/Grade:</label>
                                <input type="text" value="{{$school->class}}" name="class" class=" from-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Class" required>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold"> Total Fee:</label>
                                <input type="text" value="{{$school->fee}}" name="fee" class=" from-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Fee" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">No of Boys:</label>
                                <input type="text" value="{{$school->boys}}" name="boys" class=" from-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Boys " required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">No of Girls:</label>
                                <input type="text" value="{{$school->girls}}" name="girls" class=" from-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Girls " required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">Total Students:</label>
                                <input type="text" value="{{$school->totalstudents}}" name="totalstudents" class=" from-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Students " required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="text-sm font-semibold">1. Expired image of E- license or EMIS CODE of E- License.:</label>
                                <input type="file" accept="image/*" value="{{$school->expiredlicense}}" class="form-control-file" name="expiredelicense" placeholder="">
                                <img src="{{ asset('storage/'.$school->expiredelicense) }}" style="object-fit: cover;" width="100px" height="100px" alt="Expired License Image abc">
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
