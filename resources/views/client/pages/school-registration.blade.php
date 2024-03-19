@extends('client.layout')

@section('styles')
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('content')
    <section class="pt-44 px-4 md:px-10">
        <h1 class="text-2xl md:text-3xl font-semibold my-3">School Registration</h1>
        <form action="{{route('client.add_school')}}" method="POST">
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
                        <option value="2">Un-Registered</option>
                        <option value="1">Registered</option>
                        <option value="3">Under Progress</option>
                    </select>
                </div>
                <div>
                    <label for="" class="text-sm font-semibold">No. of Boys</label>
                    <input type="text" name="no_of_boys" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="No. of Boys" required>
                </div>
                <div>
                    <label for="" class="text-sm font-semibold">No. of Girls</label>
                    <input type="text" name="no_of_girls" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="No. of Girls" required>
                </div>
                <div>
                    <label for="" class="text-sm font-semibold">Covered Area</label>
                    <input type="text" name="covered_area" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Covered Area" required>
                </div>
                <div>
                    <label for="" class="text-sm font-semibold">No. of Teachers</label>
                    <input type="text" name="no_of_teachers" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="No. of Teachers" required>
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
                    <label  class="text-sm font-semibold">School Affiliated with</label>
                    <select class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" name="school_affiliated" style="width: 100%;" required>
                      <option value="BISE">BISE Rawalpindi</option>
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
                    <select name="province" id="provinceDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                        <option value="">Choose Province</option>
                        @foreach ($provinces as $province)
                            <option value="{{$province->province_id}}">{{$province->province_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="" class="text-sm font-semibold">Select District</label>
                    <select name="district" id="districtDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                        <option value="">Choose District</option>
                        @foreach ($districts as $dist)
                        <option value="{{$dist->district_id}}">{{$dist->district_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="" class="text-sm font-semibold">Select Tehsil</label>
                    <select name="tehsil" id="tehsilDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                        <option value="">Choose Tehsil</option>
                        @foreach ($tehsils as $tehsil)
                        <option value="{{$tehsil->tehsil_id}}">{{$tehsil->tehsil_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="" class="text-sm font-semibold">Select City</label>
                    <select name="city" id="citiesDropdown" class="select2bs4 outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                        <option value="">Choose City</option>
                        @foreach ($cities as $city)
                        <option value="{{$city->city_id}}">{{$city->city_name}}</option>
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
                    <input type="text" name="location_string" class="outline-none rounded-md w-full h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" placeholder="Location String" >
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-center md:justify-end items-center gap-3 my-3">
                <div class="flex justify-center items-center">
                    <label for="captcha" class="text-sm font-semibold mx-3">CAPTCHA: What is <span id="firstNumber"></span> + <span id="secondNumber"></span> =</label>
                    <input type="text" id="captcha" name="captcha" class="outline-none rounded-md w-[70px] h-[35px] px-3" style="border: 1px solid rgb(211, 209, 209)" required>
                </div>
                <button type="submit" id="submitButton" class="bg-[#00C282] text-white w-full md:w-[200px] h-[35px] rounded-md shadow-md">submit</button>
            </div>
        </form>
    </section>

    @if(session('error'))
    <input type="hidden" id="error-message" value="{{ session('error') }}">
    @endif

    @if(session('success'))
        <input type="hidden" id="success-message" value="{{ session('success') }}">
    @endif
@endsection

@section('scripts')
        <script src="{{asset('/assets/plugins/select2/js/select2.full.min.js')}}"></script>
        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

                $('#provinceDropdown').change(function() {
                          var selectedProvince = $(this).val();

                          if (selectedProvince) {
                              $.ajax({
                                  url: '/admin/school/get/district/ajax/' + selectedProvince,
                                  type: 'GET',
                                  success: function(data) {
                                      $('#districtDropdown').empty();
                                      $('#districtDropdown').append($("<option></option>")
                                              .attr("value", "")
                                              .text("Choose District"));
                                      $.each(data, function(index, district) {
                                          $('#districtDropdown').append($("<option></option>")
                                              .attr("value", district.district_id)
                                              .text(district.district_name));
                                      });
                                  }
                              });
                          } else {
                              $('#districtDropdown').empty();
                          }
                      });

                      $('#districtDropdown').change(function() {
                          var selectedProvince = $(this).val();

                          if (selectedProvince) {
                              $.ajax({
                                  url: '/admin/school/get/tehsil/ajax/' + selectedProvince,
                                  type: 'GET',
                                  success: function(data) {
                                      $('#tehsilDropdown').empty();
                                      $('#tehsilDropdown').append($("<option></option>")
                                              .attr("value", "")
                                              .text("Choose Tehsil"));
                                      $.each(data, function(index, tehsil) {
                                          $('#tehsilDropdown').append($("<option></option>")
                                              .attr("value", tehsil.tehsil_id)
                                              .text(tehsil.tehsil_name));
                                      });
                                  }
                              });
                          } else {
                              $('#tehsilDropdown').empty();
                          }
                      });

                      $('#tehsilDropdown').change(function() {
                          var selectedProvince = $(this).val();

                          if (selectedProvince) {
                              $.ajax({
                                  url: '/admin/school/get/cities/ajax/' + selectedProvince,
                                  type: 'GET',
                                  success: function(data) {
                                      $('#citiesDropdown').empty();
                                      $('#citiesDropdown').append($("<option></option>")
                                              .attr("value", "")
                                              .text("Choose City"));
                                      $.each(data, function(index, cities) {
                                          $('#citiesDropdown').append($("<option></option>")
                                              .attr("value", cities.city_id)
                                              .text(cities.city_name));
                                      });
                                  }
                              });
                          } else {
                              $('#citiesDropdown').empty();
                          }
                      });

                // CAPTCHA question
                let firstNumber = Math.floor(Math.random() * 10) + 1;
                let secondNumber = Math.floor(Math.random() * 10) + 1;
                let correctAnswer = firstNumber + secondNumber;
                let captchaInput = document.getElementById('captcha');
                let submitButton = document.getElementById('submitButton');

                submitButton.setAttribute('disabled', 'disabled');
                submitButton.style.backgroundColor = 'gray';
                $('#firstNumber').text(firstNumber);
                $('#secondNumber').text(secondNumber);

                captchaInput.addEventListener('blur', function() {
                    let userAnswer = parseInt(captchaInput.value, 10);
                    if (userAnswer === correctAnswer) {
                        captchaInput.style.border = '1px solid green';
                        submitButton.removeAttribute('disabled');
                        submitButton.style.backgroundColor = '#00C282';
                    } else {
                        captchaInput.style.border = '1px solid red';
                        submitButton.setAttribute('disabled', 'disabled');
                        submitButton.style.backgroundColor = 'gray';
                    }
                });

                captchaInput.addEventListener('input', function() {
                    let userAnswer = parseInt(captchaInput.value, 10);
                    if (userAnswer === correctAnswer) {
                        captchaInput.style.border = '1px solid green';
                        submitButton.removeAttribute('disabled');
                        submitButton.style.backgroundColor = '#00C282';
                    } else {
                        captchaInput.style.border = '1px solid red';
                        submitButton.setAttribute('disabled', 'disabled');
                        submitButton.style.backgroundColor = 'gray';
                    }
                });
            });
        </script>
@endsection
