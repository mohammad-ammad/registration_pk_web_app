@extends('client.layout')
@section('styles')
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
<section class="pt-44 px-4 md:px-10">
    {{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5"> --}}
        <h1 class="text-2xl md:text-3xl font-semibold my-3">BISE Rwp Affiliation Form </h1>

        <form action="{{ route('college_registration.submit') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5">
            <!--Form Fields-->
            <div>
                <label for="" class="text-sm font-semibold">College Name:</label>
                <input type="text" name="college_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter College Name" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">District Name:</label>
                <select name="district" id="districtDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    @foreach ($districts as $district)
                            <option value="{{$district->district_name}}">{{$district->district_name}}</option>
                        @endforeach
                </select>
            </div>


            <div>
                <label for="" class="text-sm font-semibold">Tehsil Name:</label>
                <select name="tehsil" id="districtDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    @foreach ($tehsils as $tehsil)
                            <option value="{{$tehsil->tehsil_name}}">{{$tehsil->tehsil_name}}</option>
                        @endforeach
                </select>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Uc No:</label>
                <input type="text" name="uc_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="UC NO." required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Na No:</label>
                <input type="text" name="na_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="NA NO." required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">PP No:</label>
                <input type="text" name="pp_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="PP NO." required>
            </div>


            <div>
                <label for="" class="text-sm font-semibold">Registered Gender:</label>
                <select name="gender" id="" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Gender Studying:</label>
                <input type="text" name="gender_studying" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Gender Studying." required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Location:</label>
                <input type="text" name="location" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Location." required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Shift:</label>
                <select name="shift" id="" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="morning">Morning</option>
                    <option value="evening">Evening</option>
                </select>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Establishment Year</label>
                <input type="text" name="establishment_year" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Establishment Year" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">College Address</label>
                <input type="text" name="college_address" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter College Address">
            </div>

            <div>
                <label for="" class="text-sm font-semibold">College Type:</label>
                <select name="college_type" id="" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="general">General</option>
                    <option value="trust">Trust</option>
                </select>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">College Email:</label>
                <input type="email" name="college_email" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="College Email" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Private Registration Expiry Date:</label>
                <input type="date" name="registrationExpiryDate" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Registration Expiry Date:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">College Contact No:</label>
                <input type="text" name="college_contact_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="College Contact No " required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Owner Name:</label>
                <input type="text" name="owner_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Name" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Owner No:</label>
                <input type="text" name="owner_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner No" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Owner Cnic(without dashes):</label>
                <input type="number" name="owner_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner CNIC" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Principal Name:</label>
                <input type="text" name="principal_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Name" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Principal No:</label>
                <input type="text" name="principal_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal No" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Principal Cnic(without dashes):</label>
                <input type="number" name="principal_cnic" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal CNIC" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Nature of Ownership:</label>
                <input type="text" name="ownership_nature" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Nature of Ownership" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Total Male Teacher:</label>
                <input type="text" name="male_teacher" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Male Teacher" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Total FeMale Teacher:</label>
                <input type="text" name="female_teacher" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total FeMale Teacher" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">College Stats:</label>
                <input type="text" name="college_stats" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter college Stats " required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Affiliation With University:</label>
                <input type="text" name="university_affiliation" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Affiliation With University " required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Affiliation With Board:</label>
                <input type="text" name="board_affiliation" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Affiliation With Board " required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Total Branches:</label>
                <input type="text" name="total_branches" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Branches" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Total Classrooms:</label>
                <input type="text" name="total_clasrooms" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Classrooms" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Total rooms(other than class-rooms):</label>
                <input type="text" name="total_rooms" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total rooms(other than class-rooms)" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Building Area Type:</label>
                <input type="text" name="building_type" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Building Type" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Total Area:</label>
                <input type="text" name="total_area" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Area" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Library AVailable:</label>
                <input type="text" name="library_available" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Library" required>
            </div>

<div>
    <label class="text-sm font-semibold">Labs:</label>
    <input type="checkbox" name="labs[]" value="bio_chemistry">
        <label for="bio_chemistry">Bio Chemistry</label>

    <input type="checkbox" name="labs[]" value="biology">
        <label for="biology">Biology</label>

    <input type="checkbox" name="labs[]" value="botany">
        <label for="botany">Botany</label>

        <input type="checkbox" name="labs[]" value="chemistry" >
        <label for="chemistry_lab">Chemistry </label>

        <input type="checkbox" name="labs[]" value="physics">
        <label for="physics_lab">Physics</label>

        <input type="checkbox" name="labs[]" value="Computer_Science">
        <label for="computer_science">Computer Science</label>

        <input type="checkbox" name="labs[]" value="Inorganic_chemistry">
        <label for="">Inorganic Chemistry</label>

        <input type="checkbox" name="labs[]" value="organic_chemistry">
        <label for="">Organic Chemistry</label>

        <input type="checkbox" name="labs[]" value="zoology">
        <label for="">Zoology</label>
</div>

            <div>
                <label for="" class="text-sm font-semibold">Total Computers(P-I & P-II Series):</label>
                <input type="text" name="total_computers_p1_p2_series" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Computers(P-I & P-II Series)" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Total Computers(P-III Series):</label>
                <input type="text" name="total_computers_p3_series" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Computers(P-III Series)" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Total Computers (P-IV Series or Higher):</label>
                <input type="text" name="total_computers_p4_series" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Computers (P-IV Series or Higher)" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Total Number of functional computers used for teaching/learning purposes(P-I & P-II Series):</label>
                <input type="text" name="functional_computers_p1_p2_series" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Total Number of functional computers used for teaching/learning purposes	" required>
            </div>
            <!-- Submit Button -->
        </div>
        <div class="flex flex-col md:flex-row justify-center md:justify-end items-center gap-3 my-3">
            <button type="submit" id="submitButton" class="bg-[#00C282] text-white w-full md:w-[200px] h-[35px] rounded-md shadow-md">Submit</button>
        </div>
          </form>
    </div>
</section>
@endsection
