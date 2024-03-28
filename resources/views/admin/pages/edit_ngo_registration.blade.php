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
                <h1 class="m-0">Manage NGO</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage NGO </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <form action="{{route('ngo.registration.update' , ['id' => $ngo->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h3 class="card-title">Edit NGO Details</h3>

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
                            <label for="" class="text-sm font-semibold">President Name:</label>
                            <input type="text" value="{{$ngo->president_name}}" name="president_name" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter President Name" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">President CNIC:</label>
                            <input type="text" value="{{$ngo->president_cnic}}" name="president_cnic" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter President Cnic" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">NGO Name:</label>
                            <input type="text" value="{{$ngo->ngo_name}}" name="ngo_name" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter NGO Name" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Head Office Address:</label>
                            <input type="text" value="{{$ngo->head_office_address}}" name="head_office_address" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Head Office Address" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Organization Purpose:</label>

                            <textarea name="organization_purpose" class="form-control outline-none" style="border: 1px solid rgb(211, 209, 209)" id="" cols="30" rows="5">{{$ngo->organization_purpose}}</textarea>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Area of operation Federal / Province</label>
                            <input type="text" value="{{$ngo->area_of_operation}}" name="area_of_operation" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Area of Opeartion" required>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Nature of NGO:</label>
                            <input type="text" value="{{$ngo->ngo_nature}}" name="ngo_nature" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Nature of NGO ">
                        </div>

                        <div class="col-md-3">
                            <label for="" class="text-sm font-semibold">Establishing Date:</label>
                            <input type="date" value="{{$ngo->establishing_date}}" name="establishing_date" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Eshtablishing  Date:" required>
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
