@extends('client.layout')

@section('styles')
<link rel="stylesheet" href="{{asset('/assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection
@section('content')
<section class="pt-44 px-4 md:px-10">
    {{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5"> --}}
    <h1 class="text-2xl md:text-3xl font-semibold my-3">School Registration Fresh </h1>

    <form action="{{route('school_registration_fresh.submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5">
            <div>
                <label for="" class="text-sm font-semibold">School Name</label>
                <input type="text" name="school_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter School Name" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Branch Name</label>
                <input type="text" name="branch_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Branch Name" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">School Address</label>
                <input type="text" name="school_address" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter School Address" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">School Status</label>
                <select name="school_status" id="" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="Un-Registered">Un-Registered</option>
                    <option value="Registered">Registered</option>
                    <option value="Under-Progress">Under Progress</option>
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">No. of Boys</label>
                <input type="number" name="no_of_boys" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="No. of Boys" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">No. of Girls</label>
                <input type="number" name="no_of_girls" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="No. of Girls" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Covered Area</label>
                <input type="number" name="covered_area" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Covered Area" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">No. of Teachers</label>
                <input type="number" name="no_of_teachers" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="No. of Teachers" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">School Type</label>
                <select name="school_type" id="" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="boys">Boys</option>
                    <option value="girls">Girls</option>
                    <option value="combined">Co-education</option>
                </select>
            </div>
            <div>
                <label class="text-sm font-semibold">School Affiliated with</label>
                <select class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" name="school_affiliated" style="width: 100%;" required>
                    <option value="BISE Rawalpindi">BISE Rawalpindi</option>
                    <option value="FBISE">FBISE</option>
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Instruction Medium</label>
                <select name="instruction_medium" id="" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="english">English</option>
                    <option value="urdu">Urdu</option>
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">School Level</label>
                <select name="school_level" id="" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="primary">Primary</option>
                    <option value="middle">Elementary</option>
                    <option value="secondary">Secondary</option>
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Owner Name</label>
                <input type="text" name="owner_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Owner Name" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Owner Phone No.</label>
                <input type="text" name="owner_ph_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Owner Phone No." required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Owner Email</label>
                <input type="email" name="owner_email" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Owner Email" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Principal Name</label>
                <input type="text" name="principal_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Principal Name" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Principal Phone No.</label>
                <input type="text" name="principal_ph_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Principal Phone No." required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Principal Email</label>
                <input type="email" name="principal_email" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Principal Email" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Select Province</label>
                <select name="province_name" id="provinceDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Choose Province</option>
                    @foreach ($provinces as $province)

                    <option value="{{$province->province_name}}">{{$province->province_name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Select District</label>
                <select name="district_name" id="districtDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Choose District</option>
                    @foreach ($districts as $dist)
                    <option value="{{$dist->district_name}}">{{$dist->district_name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Select Tehsil</label>
                <select name="tehsil_name" id="tehsilDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Choose Tehsil</option>
                    @foreach ($tehsils as $tehsil)
                    <option value="{{$tehsil->tehsil_name}}">{{$tehsil->tehsil_name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Select City</label>
                <select name="city_name" id="citiesDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Choose City</option>
                    @foreach ($cities as $city)
                    <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Latitude</label>
                <input type="text" name="latitude" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Latitude" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Longitude</label>
                <input type="text" name="longitude" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Longitude">
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Location String</label>
                <input type="text" name="location_string" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Location String">
            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-center md:justify-end items-center gap-3 my-3">
            <div class="">
                @php
                $num1 = rand(1, 10);
                $num2 = rand(1, 10);
                $correctAnswer = $num1 + $num2;
                @endphp
                <label>What is the sum of {{ $num1 }} + {{ $num2 }}?</label>
                <input type="hidden" name="correct_answer" value="{{ $correctAnswer }}">
                <input type="text" name="captcha_answer" class="outline-gray-800 rounded-md w-10 p-5 h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)">
            </div>
            <button type="submit" id="submitButton" class="bg-[#00C282] text-white w-full md:w-[200px] h-[35px] rounded-md shadow-md">Submit</button>
        </div>
    </form>
    </div>
</section>
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
