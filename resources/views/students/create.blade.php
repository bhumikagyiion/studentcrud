@extends('students.layout')
@section('content')

    <div class="card">
        <div class="card-header">Students Page</div>
        <div class="card-body">

            <form id="student-form" action="{{ url('student') }}" method="post">
                <p id="result" class="text-danger"></p>

                {!! csrf_field() !!}

                <label>Name<span class="text-danger">*</span></label>
                </br>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                </br>
                <label>Address<span class="text-danger">*</span></label></br>
                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                </br>
                
                <label>Mobile<span class="text-danger">*</span></label></br>
                <input type="text" name="mobile" id="mobile" class="form-control" value="{{ old('mobile') }}">
                @if ($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                </br>
                <input type="submit" value="Save" class="btn btn-success"></br>

            </form>

        </div>
    </div>

    <script>
        $(document).ready(function() {

            // mobile validation
            $('#mobile').on('keypress', function(e) {

                var $this = $(this);
                var regex = new RegExp("^[0-9\b]+$");
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                // for 10 digit number only
                if ($this.val().length > 9) {
                    e.preventDefault();
                    return false;
                }
                if (e.charCode < 54 && e.charCode > 47) {
                    if ($this.val().length == 0) {
                        e.preventDefault();
                        return false;
                    } else {
                        return true;
                    }

                }
                if (regex.test(str)) {
                    return true;
                }
                e.preventDefault();
                return false;
            });

            // Handle form submission and name validation
            $('#student-form').submit(function(event) {
                event.preventDefault();

                var firstName = $('#name').val().trim(); // Corrected variable initialization

                var validationMessage = validateName(firstName);

                if (validationMessage === "Valid name.") {
                    this.submit(); // Submit form if validation passes
                } else {
                    $('#result').text(validationMessage);
                }
            });

            // Validate First Name
            function validateName(firstName) {
                // Check if first name is empty
                if (!firstName) {
                    return "First name is required.";
                }

                // Check if first name contains only alphabets
                if (!/^[a-zA-Z]+$/.test(firstName)) {
                    return "Invalid first name.";
                }

                // Validation passed
                return "Valid name.";
            }

        });
    </script>

@stop
