<!DOCTYPE html>
<html lang="en">
<head>
    @include('client.partials.header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
</head>
<body>
<section class="pt-35 px-4 md:px-5">
    {{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5"> --}}
        <h1 class="text-2xl md:text-3xl font-semibold my-3">BISE Rwp Affiliation Form </h1>

        <form action="{{ route('affiliation.submit') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 my-5">
            <!--Form Fields-->
            <div>
                <label for="" class="text-sm font-semibold">Institute Name:</label>
                <input type="text" name="instituteName" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Name" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Institute Address:</label>
                <input type="text" name="instituteAddress" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Enter Institute Address" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Affiliation Type:</label>
                <select name="affiliationType" id="" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="2">SSC</option>
                    <option value="1">HSSC</option>
                </select>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Whatsapp/Phone No:</label>
                <input type="text" name="phoneNumber" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Whatsapp/Phone No." required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Email:</label>
                <input type="email" name="email" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Your Email" required>
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
                <label for="" class="text-sm font-semibold">Affiliation Type:</label>
                <select name="registrationType" id="" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    <option value="2">PERIA</option>
                    <option value="1">PEPRIS</option>
                </select>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Private Registration Issue Date:</label>
                <input type="date" name="registrationIssueDate" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Registration Issue Date:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Private Registration Expiry Date:</label>
                <input type="date" name="registrationExpiryDate" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Registration Expiry Date:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">Franchise Name:</label>
                <input type="text" name="franchiseName" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Franchise Name:" required>
            </div>

            <div>
                <label for="" class="text-sm font-semibold">City Name:</label>
                <select name="city" id="districtDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    @foreach ($cities as $city)
                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                        @endforeach
                </select>
            </div>  

            <div>
                <label for="" class="text-sm font-semibold">Tehsil Name:</label>
                <select name="tehsil" id="districtDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    @foreach ($tehsils as $tehsil)
                            <option value="{{$tehsil->tehsil_id}}">{{$tehsil->tehsil_name}}</option>
                        @endforeach
                </select>
            </div>  

            <div>
                <label for="" class="text-sm font-semibold">District Name:</label>
                <select name="district" id="districtDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    @foreach ($districts as $district)
                            <option value="{{$district->district_id}}">{{$district->district_name}}</option>
                        @endforeach
                </select>
            </div>  

            <div>
                <label for="" class="text-sm font-semibold">Province Name</label>
                <select name="province" id="districtDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                    @foreach ($provinces as $province)
                            <option value="{{$province->province_id}}">{{$province->province_name}}</option>
                        @endforeach
                </select>
            </div>  

            <div>
                <label for="" class="text-sm font-semibold">Group:</label>
                <input type="text" name="group" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Sci/Art/Tech/Pre-Eng" required>
            </div> 

            <!-- Image Upload -->
            <div class="form-group">
                <label for="" class="text-sm font-semibold">Upload Front Side Of CNIC:</label>
                <input type="file" class="form-control-file" id="frontCnic" name="frontCnic" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="" class="text-sm font-semibold">Upload Back Side Of CNIC:</label>
                <input type="file" class="form-control-file" id="backCnic" name="backCnic" accept="image/*" required>
            </div>
            <!-- Submit Button -->
            
        </div>
        <div class="flex flex-col md:flex-row justify-center md:justify-end items-center gap-3 my-3">
            <button type="submit" id="submitButton" class="bg-[#00C282] text-white w-full md:w-[200px] h-[35px] rounded-md shadow-md">Submit</button>
        </div>
          </form>
    </div>
</section>
@include('client.partials.Scripts')
</body>
</html>