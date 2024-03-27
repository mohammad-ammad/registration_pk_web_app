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
                <h1 class="m-0">Manage Building</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage Building </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <form action="{{route('building.certificate.update' , ['id' => $building->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h3 class="card-title">Edit Building Details</h3>

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
                            <input type="text" value="{{$building->schoolname}}" name="schoolname" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter School Name" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Address:</label>
                            <input type="text" value="{{$building->address}}" name="address" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Address" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Detailed Drawings of Building:</label>
                            <!-- <input type="text" name="ownername" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Name" required> -->
                            <textarea name="building_drawings"  class=" form-control outline-none" style="border: 1px solid rgb(211, 209, 209)" id="" cols="30" rows="5">{{$building->building_drawings}}</textarea>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Total Area of Plot /Dimensions:</label>
                            <input type="text" value="{{$building->total_area}}" name="total_area" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Area of Plot /Dimensions" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Covered Area of Building:</label>
                            <input type="text" value="{{$building->covered_area}}" name="covered_area" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Covered Area of Building" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Stories:</label>
                            <input type="text" value="{{$building->stories_no}}" name="stories_no" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Stories ">
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Thickness of Walls (inches):</label>
                            <input type="text" value="{{$building->walls_thickness}}" name="walls_thickness" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Thickness of Walls (inches)" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Height of Roof from FFL:</label>
                            <input type="text" value="{{$building->roof_height}}" name="roof_height" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Height of Roof from FFL" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Roof Type:</label>
                            <select name="roof_type" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="girdir"{{$building->roof_type === 'girdir' ? 'selected':''}}>Girder</option>
                                <option value="rcc"{{$building->roof_type === 'rcc' ? 'selected':''}}>RCC</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Offices:</label>
                            <input type="text" value="{{$building->no_offices}}" name="no_offices" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Offices" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Offices Dimensions:</label>
                            <input type="text" value="{{$building->offices_dimensions}}" name="offices_dimensions" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Offices Dimensions" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Offices Covered Area:</label>
                            <input type="text" value="{{$building->offices_covered_area}}" name="offices_covered_area" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Offices Covered Area" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Offices Seating Capacity:</label>
                            <input type="text" value="{{$building->offices_seating_capacity}}" name="offices_seating_capacity" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Offices Seating Capacity" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Class Rooms:</label>
                            <input type="text" value="{{$building->classroom_no}}" name="classroom_no" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Class Rooms" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Class Rooms Dimensions:</label>
                            <input type="text" value="{{$building->classroom_dimensions}}" name="classroom_dimensions" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Class Rooms Dimensions:" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Class Rooms Covered Area:</label>
                            <input type="text" value="{{$building->classroom_covered_area}}" name="classroom_covered_area" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Class Rooms Covered Area" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Class Rooms Seating capacity:</label>
                            <input type="text" value="{{$building->classroom_seating_capacity}}" name="classroom_seating_capacity" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Class Rooms Seating capacity" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Halls:</label>
                            <input type="text" value="{{$building->halls_no}}" name="halls_no" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Halls" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Halls Dimensions:</label>
                            <input type="text" value="{{$building->halls_dimensions}}" name="halls_dimensions" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Halls Dimensions" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Halls Covered Area:</label>
                            <input type="text" value="{{$building->halls_covered_area}}" name="halls_covered_area" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Halls Covered Area" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Halls Covered Seating Capacity:</label>
                            <input type="text" value="{{$building->halls_seating_capacity}}" name="halls_seating_capacity" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Halls Covered Seating Capacity" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Science Labs:</label>
                            <input type="text" value="{{$building->science_lab_no}}" name="science_lab_no" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Science Labs" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Science Labs Dimensions:</label>
                            <input type="text" value="{{$building->science_lab_dimensions}}" name="science_lab_dimensions" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Science Labs Dimensions" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Science Labs Covered Area:</label>
                            <input type="text" value="{{$building->science_lab_covered_area}}" name="science_lab_covered_area" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Science Labs Covered Area" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Science Labs Seating Capacity:</label>
                            <input type="text" value="{{$building->science_lab_seating_capacity}}" name="science_lab_seating_capacity" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Science Labs Seating Capacity" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Librarys:</label>
                            <input type="text" value="{{$building->no_library}}" name="no_library" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="No of Librarys" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Librarys Dimensions:</label>
                            <input type="text" value="{{$building->library_dimensions}}" name="library_dimensions" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Librarys Dimensions" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Librarys Covered Area:</label>
                            <input type="text" value="{{$building->library_covered_area}}" name="library_covered_area" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Librarys Covered Area" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Librarys Seating Capacity:</label>
                            <input type="text" value="{{$building->library_seating_capacity}}" name="library_seating_capacity" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Librarys Seating Capacity" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">No of Wahsrooms :</label>
                            <input type="text" value="{{$building->nowashrooms}}" name="nowashrooms" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Wahsrooms " required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Strength of Students:</label>
                            <input type="text" value="{{$building->student_strength}}" name="student_strength" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Strength of Students" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">System of Vantilation:</label>
                            <input type="text" value="{{$building->vantilation_system}}" name="vantilation_system" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter System of Vantilation" required>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Fire Extinguishers:</label>
                            <select name="Fire_Extinguishers" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="yes"{{$building->Fire_Extinguishers === 'yes' ? 'selected':''}}>Yes</option>
                                <option value="no"{{$building->Fire_Extinguishers === 'no' ? 'selected':''}}>No</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Security Cameras:</label>
                            <select name="Security_Cameras" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                                <option value="">Select</option>
                                <option value="yes"{{$building->Security_Cameras === 'yes' ? 'selected':''}}>Yes</option>
                                <option value="no"{{$building->Security_Cameras === 'no' ? 'selected':''}}>No</option>
                            </select>
                        </div>


                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Stairs Type:</label>
                            <input type="text" value="{{$building->stairs_type}}" name="stairs_type" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Class" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Grill Type:</label>
                            <input type="text" value="{{$building->grill_type}}" name="grill_type" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Grill Type" required>
                        </div>



                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Play Area/Lawn:</label>
                            <input type="text" value="{{$building->play_area}}" name="play_area" class=" form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Play Area/Lawn " required>
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
