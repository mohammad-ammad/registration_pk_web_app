@extends('client.layout')
@section('styles')
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
<section class="pt-44 px-4 md:px-10">
    {{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5"> --}}
        <h1 class="text-2xl md:text-3xl font-semibold my-3">NGO Registartion Form </h1>

        <form action="{{ route('ngo_registartion.submit') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5">
            <!--Form Fields-->
            <div>
                <label for="" class="text-sm font-semibold">President Name:</label>
                <input type="text" name="presidentName" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter President Name" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">President CNIC:</label>
                <input type="text" name="presidentCnic" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter President Cnic" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">NGO Name:</label>
                <input type="text" name="ngoName" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter NGO Name" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Head Office Address:</label>
                <input type="text" name="head_office_address" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Head Office Address" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Organization Purpose:</label>
                <!-- <input type="email" name="organization_purpose" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Your Email" required> -->
            <textarea name="organization_purpose" class="outline-none" style="border: 1px solid rgb(211, 209, 209)" id="" cols="30"  rows="5"></textarea>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Area of operation Federal / Province</label>
                <input type="text" name="area_of_operation" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Area of Opeartion" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Nature of NGO:</label>
                <input type="text" name="ngo_nature" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Nature of NGO ">
            </div>

            <div>
                <label for="" class="text-sm font-semibold">President Domicile:</label>
                <input type="file"  accept="image/*" class="form-control-file"  name="president_domicile"  placeholder="" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Establishing Date:</label>
                <input type="date" name="establishing_date" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Eshtablishing  Date:" required>
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
