@extends('client.layout')
@section('styles')
<link rel="stylesheet" href="{{asset('/assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
<section class="pt-44 px-4 md:px-10">
    {{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5"> --}}
    <h1 class="text-2xl md:text-3xl font-semibold my-3">ONLINE AFFILIATION SYSTEM BISE RAWALPINDI </h1>

    <form action="{{route ('rwp_affiliation.fresh.submit') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5">
            <!--Form Fields-->
            <div>
                <label for="" class="text-sm font-semibold">Name of School/Institute:</label>
                <input type="text" name="school_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Type" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Address:</label>
                <input type="text" name="address" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Address" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">District:</label>
                <input type="text" name="district" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter District" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Tehsil:</label>
                <input type="text" name="tehsil" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Tehsile" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">School Registartion No:</label>
                <input type="text" name="reg_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Registartion No" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Contact:</label>
                <input type="text" name="contact" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Contact ">
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Owner Name:</label>
                <input type="text" name="owner_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Name" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Owner Contact:</label>
                <input type="text" name="owner_contact" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Contact" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Cnic:</label>
                <input type="text" name="cnic" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Cnic" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Qualification:</label>
                <input type="text" name="qualification" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter qualification" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Owner Email Aaddress:</label>
                <input type="email" name="owner_email_address" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Owner Email" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Principal Name:</label>
                <input type="text" name="principal_name" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Name" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Principal Contact:</label>
                <input type="text" name="principal_contact" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Contact" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Principal Cnic:</label>
                <input type="text" name="principal_cnic" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Cnic" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Principal Qualification:</label>
                <input type="text" name="principal_qualification" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Qualification" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Principal Email:</label>
                <input type="email" name="principal_email" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Principal Email" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Level of School:</label>
                <input type="text" name="school_level" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Level of School" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Gender:</label>
                <select name="gender" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">No of ClassRooms:</label>
                <input type="text" name="classrooms_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of School" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">No of Washrooms:</label>
                <input type="text" name="washrooms_no" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Washrooms" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Total Staff:</label>
                <input type="text" name="total_staff" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Staff" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Male Staff:</label>
                <input type="text" name="male_staff" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Male Staff" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">FeMale Staff:</label>
                <input type="text" name="female_staff" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter FeMale Staff" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Non Teaching Staff:</label>
                <input type="text" name="non_teaching_staff" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Non Teaching  Staff" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Building:</label>
                <select name="building" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="reuted">Reuted</option>
                    <option value="owned">Owned</option>
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">PlayGround:</label>
                <select name="playground" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="available">Available</option>
                    <option value="not">Not</option>
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Laboratories:</label>
                <select name="laboratories" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="physics">Physics</option>
                    <option value="chemistry">Chemistry</option>
                    <option value="biology">Biology</option>
                    <option value="computer">Computer</option>
                    <option value="nill">None</option>

                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Is Lab Attendent Available :</label>
                <select name="lab_attendent" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>


                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">For which group to be affiliated:</label>
                <select name="which_group_affiliated" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="science">Science</option>
                    <option value="arts">Arts</option>
                    <option value="general science">General Science</option>
                    <option value="humanities">Humanities</option>
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Does Institute have registered body:</label>
                <select name="registered_body" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="trust">Trust</option>
                    <option value="soceity">Soceity</option>
                    <option value="ngo">NGO</option>
                    <option value="corporate_body">Corporate Body </option>
                    <option value="nil">None </option>
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Does Institute run by an:</label>
                <select name="institute_run" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="individual">Individual</option>
                    <option value="franchise">Franchise</option>
                    <option value="nil">None </option>
                </select>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Does Institute have sufficient budget for smooth running for six months:</label>
                <select name="sufficient_budget" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="yes">yes</option>
                    <option value="no">no</option>

                </select>
            </div>

            <!-- Submit Button -->

            <div class="gap-3 my-3">
                <button type="submit" id="submitButton" class="bg-[#00C282] text-white w-full md:w-[200px] h-[35px] rounded-md shadow-md">Submit</button>
            </div>
        </div>
    </form>
    </div>
</section>
@endsection
