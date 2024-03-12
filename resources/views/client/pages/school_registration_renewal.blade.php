@extends('client.layout')

@section('styles')
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
<section class="pt-44 px-4 md:px-10">
    {{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5"> --}}
        <h1 class="text-2xl md:text-3xl font-semibold my-3">School Registration Renewal </h1>

        <form action="{{route('school_registration_renewal.submit')}}" method="post" enctype="multipart/form-data">
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
                <input type="text"   class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)"  name="principalname"  placeholder="Enter Principal Name" required>
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
                <label for="" class="text-sm font-semibold">No of Classrooms  :</label>
                <input type="text" name="noclassrooms" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Classrooms:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">No of Wahsrooms  :</label>
                <input type="text" name="nowashrooms" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Washrooms:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Total Staff:</label>
                <input type="text" name="total_staff" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Staff" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Male Staff:</label>
                <input type="text" name="malestaff" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Male Staff" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">FeMale Staff:</label>
                <input type="text" name="femalestaff" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter FeMale Staff" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Non Teaching Staff:</label>
                <input type="text" name="nonteachingstaff" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Non Teaching  Staff" required>
            </div>
            <div>
                <label for="" class="text-sm font-semibold">Building:</label>
                <select name="building" id="" class="form-control outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="">Select</option>
                    <option value="rented">Rented</option>
                    <option value="owned">Owned</option>
                </select>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Class/Grade:</label>
                <input type="text" name="class" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Class" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Fee:</label>
                <input type="text" name="fee" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Fee" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">No of Boys:</label>
                <input type="text" name="boys" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Boys " required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">No of Girls:</label>
                <input type="text" name="girls" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter No of Girls " required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Total Students:</label>
                <input type="text" name="totalstudents" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Total Students " required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">1. Expired image of E- license or EMIS CODE of E- License.:</label>
                <input type="file"  accept="image/*" class="form-control-file"  name="expiredelicense"  placeholder="" required>
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

@section('scripts')





@endsection
