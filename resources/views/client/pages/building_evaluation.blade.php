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
        <h1 class="text-2xl md:text-3xl font-semibold my-3">Building Evaluation </h1>

        <form action="{{route('building_evaluation.submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5">
            <!--Form Fields-->
            <div>
                <label for="" class="text-sm font-semibold">School Name:</label>
                <input type="text" name="schoolname" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter School Name" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Address:</label>
                <input type="text" name="address" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Address" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Detailed Drawings of Building:</label>
                <!-- <input type="text" name="ownername" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Name" required> -->
                <textarea name="building_drawings" class="outline-none" style="border: 1px solid rgb(211, 209, 209)" id="" cols="30"  rows="5"></textarea>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Total Area of Plot /Dimensions:</label>
                <input type="text" name="total_area" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Area of Plot /Dimensions" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Covered Area of Building:</label>
                <input type="text" name="covered_area" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Covered Area of Building" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">No of Stories:</label>
                <input type="text" name="stories_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Stories ">
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Thickness of Walls (inches):</label>
                <input type="text" name="walls_thickness"   class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)"    placeholder="Enter Thickness of Walls (inches)" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Height of Roof from FFL:</label>
                <input type="text" name="roof_height" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Height of Roof from FFL" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Roof Type:</label>
                <select name="roof_type" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="girdir">Girder</option>
                    <option value="rcc">RCC</option>
                </select>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">No of Offices:</label>
                <input type="text" name="no_offices" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Offices" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Offices Dimensions:</label>
                <input type="text" name="offices_dimensions" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Offices Dimensions" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Offices Covered Area:</label>
                <input type="text" name="offices_covered_area" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Offices Covered Area" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Offices Seating Capacity:</label>
                <input type="text" name="offices_seating_capacity" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Offices Seating Capacity" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">No of Class Rooms:</label>
                <input type="text" name="classroom_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Class Rooms" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Class Rooms Dimensions:</label>
                <input type="text" name="classroom_dimensions" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Class Rooms Dimensions:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Class Rooms Covered Area:</label>
                <input type="text" name="classroom_covered_area" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Class Rooms Covered Area" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Class Rooms Seating capacity:</label>
                <input type="text" name="classroom_seating_capacity" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Class Rooms Seating capacity" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">No of Halls:</label>
                <input type="text" name="halls_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Halls" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Halls Dimensions:</label>
                <input type="text" name="halls_dimensions" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Halls Dimensions" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Halls Covered Area:</label>
                <input type="text" name="halls_covered_area" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Halls Covered Area" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Halls Covered Seating Capacity:</label>
                <input type="text" name="halls_seating_capacity" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Halls Covered Seating Capacity" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">No of Science Labs:</label>
                <input type="text" name="science_lab_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Science Labs" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Science Labs Dimensions:</label>
                <input type="text" name="science_lab_dimensions" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Science Labs Dimensions" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Science Labs Covered Area:</label>
                <input type="text" name="science_lab_covered_area" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Science Labs Covered Area" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Science Labs Seating Capacity:</label>
                <input type="text" name="science_lab_seating_capacity" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Science Labs Seating Capacity" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">No of Librarys:</label>
                <input type="text" name="no_library" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="No of Librarys" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Librarys Dimensions:</label>
                <input type="text" name="library_dimensions" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Librarys Dimensions" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Librarys Covered Area:</label>
                <input type="text" name="library_covered_area" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Librarys Covered Area" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Librarys Seating Capacity:</label>
                <input type="text" name="library_seating_capacity" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Librarys Seating Capacity" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">No of Wahsrooms  :</label>
                <input type="text" name="nowashrooms" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Wahsrooms " required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Strength of Students:</label>
                <input type="text" name="student_strength" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Strength of Students" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">System of Vantilation:</label>
                <input type="text" name="vantilation_system" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter System of Vantilation" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Fire Extinguishers:</label>
                <select name="Fire_Extinguishers" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Security Cameras:</label>
                <select name="Security_Cameras" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>


            <div>
                <label for="" class="text-sm font-semibold">Stairs Type:</label>
                <input type="text" name="stairs_type" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Class" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Grill Type:</label>
                <input type="text" name="grill_type" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Grill Type" required>
            </div>



            <div>
                <label for="" class="text-sm font-semibold">Play Area/Lawn:</label>
                <input type="text" name="play_area" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Play Area/Lawn " required>
            </div>



            <!-- Submit Button -->
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
            "progressBar":true,
            "closeButton":true,
        }
    toastr.success("{{Session::get('message')}}")

    </script>

    @endif

    @if (Session::has('error'))
    <script>
        toastr.options = {
            "progressBar":true,
            "closeButton":true,
        }

    toastr.error("{{Session::get('error')}}")
    </script>

@endif


@if (Session::has('captcha_answer'))
    <script>
        toastr.options = {
            "progressBar":true,
            "closeButton":true,
        }

    toastr.error("{{Session::get('captcha_answer')}}")
    </script>

@endif



@endsection
