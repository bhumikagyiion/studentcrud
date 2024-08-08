@extends('students.layout')
@section('content')

    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <form id="student-form" action="{{ url('student/' . $students->id) }}" method="post">
                <p id="result" class="text-danger"></p>
                {!! csrf_field() !!}
                @method('PATCH')
                <input type="hidden" name="id" id="id" value="{{ $students->id }}" />

                <div class="form-group">
                    <label for="name">Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" value="{{ $students->name }}" class="form-control">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="address">Address<span class="text-danger">*</span></label>
                    <input type="text" name="address" id="address" value="{{ $students->address }}"
                        class="form-control">
                    @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="mobile">Mobile<span class="text-danger">*</span></label>
                    <input type="text" name="mobile" id="mobile" value="{{ $students->mobile }}"
                        class="form-control">
                    @if ($errors->has('mobile'))
                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                    @endif
                </div>

                <button type="submit" value="Update" class="btn btn-success"
                    onclick="return confirm('Are you sure you want to update?')">Update</button>
                <a href="{{ url('/student/') }}" title="View Student">
                    <button type="button" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                        Cancel</button>
                </a>
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
