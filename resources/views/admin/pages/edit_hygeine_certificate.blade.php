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
                <h1 class="m-0">Manage Hygeine</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage Hygeine </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <form action="{{route('hygeine.certificate.update' , ['id' => $hygeine->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h3 class="card-title">Edit Hygeine Details</h3>

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
                            <label for="" class="text-sm font-semibold">Institute Name:</label>
                            <input type="text" value="{{$hygeine->institute_name}}" name="institute_name" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Name" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Institute Address:</label>
                            <input type="text"  value="{{$hygeine->institute_address}}" name="institute_address" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Address" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Owner Name:</label>
                            <input type="text"  value="{{$hygeine->owner_name}}" name="owner_name" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Name" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Contact/Whatsapp:</label>
                            <input type="text"  value="{{$hygeine->contact_whatsapp}}" name="contact_whatsapp" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Contact/Whatsapp" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Owner Email Address:</label>
                            <input type="email"  value="{{$hygeine->owner_email}}" name="owner_email" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Owner Email" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Level Of School:</label>
                            <input type="text"  value="{{$hygeine->school_level}}" name="school_level" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Level Of School" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Building:</label>
                            <select name="building_type" id="" class="select2bs4  form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="2"{{$hygeine->building_type == '2' ? 'selected':''}}>Own</option>
                                <option value="1"{{$hygeine->building_type == '1' ? 'selected':''}}>Rented</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Number Of Students:</label>
                            <input type="number"  value="{{$hygeine->number_of_students}}" name="number_of_students" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Number Of Student" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Number Of Staff Members:</label>
                            <input type="number"  value="{{$hygeine->number_of_staff_members}}" name="number_of_staff_members" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Number Of Staff" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Number Of Rooms:</label>
                            <input type="number"  value="{{$hygeine->number_of_rooms}}" name="number_of_rooms" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Number Of Rooms" required>
                        </div>


                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Number Of Blocks:</label>
                            <input type="number"  value="{{$hygeine->number_of_blocks}}" name="number_of_blocks" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Blocks" required>
                        </div>
                        <div class="col-md-3">
                            <label for="school_building" class="text-sm font-semibold">Condition Of Classrooms:</label>
                            <select name="classrooms_condition" id="school_building" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="3"{{$hygeine->classrooms_condition == '3' ? 'selected':''}}>Desk</option>
                                <option value="2"{{$hygeine->classrooms_condition == '2' ? 'selected':''}}>Chair</option>
                                <option value="1"{{$hygeine->classrooms_condition == '1' ? 'selected':''}}>Bench</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="school_building" class="text-sm font-semibold">Play Ground:</label>
                            <select name="playground" id="school_building" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="2"{{$hygeine->playground == '2' ? 'selected':''}}>Available</option>
                                <option value="1"{{$hygeine->playground == '1' ? 'selected':''}}>Not Available</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="school_building" class="text-sm font-semibold">Medical Facilities:</label>
                            <select name="medical_facilities" id="school_building" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="2"{{$hygeine->medical_facilities == '2' ? 'selected':''}}>Available</option>
                                <option value="1"{{$hygeine->medical_facilities == '1' ? 'selected':''}}>Not Available</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="school_building" class="text-sm font-semibold">Canteen Condition:</label>
                            <select name="canteen_condition" id="school_building" class=" form-control select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="3"{{$hygeine->canteen_condition == '3' ? 'selected':''}}>Good</option>
                                <option value="2"{{$hygeine->canteen_condition == '2' ? 'selected':''}}>Normal</option>
                                <option value="1"{{$hygeine->canteen_condition == '1' ? 'selected':''}}>Bad</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Extra Curricular Activites:</label>
                            <input type="text" value="{{$hygeine->extra_curricular_activities}}" name="extra_curricular_activities" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Extra Curricular Activites" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Remarks:</label>
                            <input type="text" value="{{$hygeine->remarks}}" name="remarks" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Remarks" required>
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
