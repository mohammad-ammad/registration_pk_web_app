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
        <h1 class="text-2xl md:text-3xl font-semibold my-3">Hygiene Application Form </h1>

        <form action="{{route('hygiene-application-submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5">
            <!--Form Fields-->
            <div>
                <label for="" class="text-sm font-semibold">Institute Name:</label>
                <input type="text" name="institute_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Name" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Institute Address:</label>
                <input type="text" name="institute_address" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Address" required>
            </div>

                <div>
                    <label for="" class="text-sm font-semibold">Owner Name:</label>
                    <input type="text" name="owner_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Name" required>
                </div>

            <div>
                <label for="" class="text-sm font-semibold">Contact/Whatsapp:</label>
                <input type="text" name="contact_whatsapp" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Contact/Whatsapp" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Owner Email Address:</label>
                <input type="email" name="owner_email" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Owner Email" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Level Of School:</label>
                <input type="text" name="school_level" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Level Of School" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Building:</label>
                <select name="building_type" id="" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="2">Own</option>
                    <option value="1">Rented</option>
                </select>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Number Of Students:</label>
                <input type="number" name="number_of_students" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Number Of Student" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Number Of Staff Members:</label>
                <input type="number" name="number_of_staff_members" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Number Of Staff" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Number Of Rooms:</label>
                <input type="number" name="number_of_rooms" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Number Of Rooms" required>
            </div>

            <div>
                 <label for="school_building" class="text-sm font-semibold">School Building:</label>
                <select name="school_building" id="school_building" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="2">Residential</option>
                    <option value="1">Commercial</option>
                </select>
            </div>

                <div>
                    <label for="" class="text-sm font-semibold">Number Of Blocks:</label>
                    <input type="number" name="number_of_blocks" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Blocks" required>
                </div>
                <div>
                    <label for="school_building" class="text-sm font-semibold">Condition Of Classrooms:</label>
                    <select name="classrooms_condition" id="school_building" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                        <option value="3">Desk</option>
                        <option value="2">Chair</option>
                        <option value="1">Bench</option>
                    </select>
                </div>
                <div>
                    <label for="school_building" class="text-sm font-semibold">Play Ground:</label>
                    <select name="playground" id="school_building" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                        <option value="2">Available</option>
                        <option value="1">Not Available</option>
                    </select>
                </div>
                <div>
                    <label for="school_building" class="text-sm font-semibold">Medical Facilities:</label>
                    <select name="medical_facilities" id="school_building" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                        <option value="2">Available</option>
                        <option value="1">Not Available</option>
                    </select>
                </div>
                <div>
                    <label for="school_building" class="text-sm font-semibold">Canteen Condition:</label>
                    <select name="canteen_condition" id="school_building" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                        <option value="3">Good</option>
                        <option value="2">Normal</option>
                        <option value="1">Bad</option>
                    </select>
                </div>
                <div>
                    <label for="" class="text-sm font-semibold">Extra Curricular Activites:</label>
                    <input type="text" name="extra_curricular_activities" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Extra Curricular Activites" required>
                </div>
                <div>
                    <label for="" class="text-sm font-semibold">Remarks:</label>
                    <input type="text" name="remarks" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Remarks" required>
                </div>

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
            </div>



         <!-- Submit Button -->
         <div class="flex flex-col md:flex-row justify-center md:justify-end gap-3 my-3">
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


