<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BISE Rwp Affiliation Form (Fresh)</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            margin: 0;
        }
        .form-container {
            border: 1px solid #000;
            padding: 20px;
            border-radius: 10px;
        }

        form {
           width : 100%;
           height : 100%;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center">BISE Rwp Affiliation Form (Fresh)</h2>

        <form action="{{ route('affiliation.submit') }}" method="post" enctype="multipart/form-data">
        @csrf
        @foreach($affiliationData as $data)
            <!--Form Fields-->
            <div class="form-group">
                <label for="instituteName">Institute Name:</label>
                <input type="text" class="form-control" id="instituteName" name="instituteName" required value="{{ $data->institute_name }}">
            </div>

            <div class="form-group">
                <label for="instituteAddress">Institute Address:</label>
                <textarea class="form-control" id="instituteAddress" name="instituteAddress" required>{{ $data->institute_address }}</textarea>
            </div>

            <div class="form-group">
                <label>Affiliation Type:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="sscAffiliation" name="affiliationType" value="SSC"
                        required {{ $data->affiliation_type == 'SSC' ? 'checked' : '' }}>
                    <label class="form-check-label" for="sscAffiliation">SSC</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="hsscAffiliation" name="affiliationType"
                        value="HSSC" required {{ $data->affiliation_type == 'HSSC' ? 'checked' : '' }}>
                    <label class="form-check-label" for="hsscAffiliation">HSSC</label>
                </div>
            </div>

            <div class="form-group">
                <label for="phoneNumber">Whatsapp/Ph:</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required value="{{ $data->phone_number }}">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{ $data->email }}">
            </div>

            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" class="form-control" id="latitude" name="latitude" required value="{{ $data->latitude }}">
            </div>

            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" class="form-control" id="longitude" name="longitude" required value="{{ $data->longitude }}">
            </div>

            <div class="form-group">
                <label>Private Registration Type:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="peiraRegistration" name="registrationType"
                        value="PEIRA" required {{ $data->registration_type == 'PEIRA' ? 'checked' : '' }}>
                    <label class="form-check-label" for="peiraRegistration">PEIRA</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="peprisRegistration" name="registrationType"
                        value="PEPRIS" required {{ $data->registration_type == 'PEPRIS' ? 'checked' : '' }}>
                    <label class="form-check-label" for="peprisRegistration">PEPRIS</label>
                </div>
            </div>

            <div class="form-group">
                <label for="registrationIssueDate">Private Registration Issue Date:</label>
                <input type="date" class="form-control" id="registrationIssueDate" name="registrationIssueDate"
                    required value="{{ $data->registration_issue_date }}">
            </div>

            <div class="form-group">
                <label for="registrationExpiryDate">Private Registration Expiry Date:</label>
                <input type="date" class="form-control" id="registrationExpiryDate" name="registrationExpiryDate"
                    required value="{{ $data->registration_expiry_date }}">
            </div>

            <div class="form-group">
                <label for="franchiseName">Franchise Name:</label>
                <input type="text" class="form-control" id="franchiseName" name="franchiseName" required value="{{ $data->franchise_name }}">
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" required value="{{ $data->city }}">
            </div>

            <div class="form-group">
                <label for="tehsil">Tehsil:</label>
                <input type="text" class="form-control" id="tehsil" name="tehsil" required value="{{$data->tehsil}}">
            </div>

            <div class="form-group">
                <label for="district">District:</label>
                <input type="text" class="form-control" id="district" name="district" required value="{{$data->district}}">
            </div>

            <div class="form-group">
                <label for="province">Province:</label>
                <input type="text" class="form-control" id="province" name="province" required value="{{$data->province}}">
            </div>

            <div class="form-group">
                <label for="group">Group:</label>
                <input type="text" class="form-control" id="group" name="group" placeholder="Sci/Art/Tech/Pre-Eng"
                    required value="{{$data->group_name}}">
            </div>

            <!-- Image Upload -->
            <div class="form-group">
                <label for="frontCnic">Upload Front Side Of CNIC:</label>
                <input type="file" class="form-control-file" id="frontCnic" name="frontCnic" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="backCnic">Upload Back Side Of CNIC:</label>
                <input type="file" class="form-control-file" id="backCnic" name="backCnic" accept="image/*" required>
            </div>
            <input type="hidden" name="id" value="{{ $data->id }}">

            <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Submit</button>
                @endforeach
        </form>
    </div>
    <!-- Bootstrap JS and Popper.js Scripts (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
</body>
</html>

