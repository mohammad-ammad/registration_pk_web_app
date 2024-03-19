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
    <h1 class="text-2xl md:text-3xl font-semibold my-3">Federal Affiliation Renewal </h1>

    <form action="{{route('federal_affiliation_renewal.submit')}}" method="post" enctype="multipart/form-data">
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
                <label for="" class="text-sm font-semibold">Owner Name:</label>
                <input type="text" name="ownername" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Name" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Owner Contact:</label>
                <input type="text" name="ownercontact" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Contact" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">CNIC:</label>
                <input type="text" name="cnic" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Your CNIC" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Qualification</label>
                <input type="text" name="qualification" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Qualification" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Owner Email Address:</label>
                <input type="email" name="owneremail" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Email ">
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Principal Name:</label>
                <input type="text" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" name="principalname" placeholder="Enter Principal Name" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Contact/WhatsApp:</label>
                <input type="text" name="principalcontact" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Contact:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Principal CNIC:</label>
                <input type="text" name="principalcnic" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal CNIC:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Principal Qualification:</label>
                <input type="text" name="principalqualification" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Qualification:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Principal Email:</label>
                <input type="email" name="principalemail" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Email:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Level of School :</label>
                <input type="text" name="schoollevel" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Level of School:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Gender:</label>
                <select name="gender" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>

                </select>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Institute Code :</label>
                <input type="text" name="institute_code" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Code:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Password :</label>
                <input type="number" name="password" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Code:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Previous Affiliation letter Image:</label>
                <input type="file" accept="image/*" class="form-control-file" name="previous_affiliation" placeholder="" required>
            </div>
        </div>

        <div>
            <h2 class="text-sm font-semibold">Staff Statement (if any)</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5">
            <div>
                <label for="" class="text-sm font-semibold">Teacher Name:</label>
                <input type="text" name="teacher_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Teacher Name" >
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Teacher CNIC:</label>
                <input type="text" name="teacher_cnic" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Teacher Cnic" >
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Teacher Qualification:</label>
                <input type="text" name="teacher_qualification" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Teacher Qualification" >
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Teacher Subject:</label>
                <input type="text" name="teacher_subject" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Teacher subject" >
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Teacher Salary:</label>
                <input type="text" name="teacher_salary" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Teacher Salary" >
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
