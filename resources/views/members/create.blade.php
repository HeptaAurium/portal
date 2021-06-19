@extends('layouts.app')

@section('title', 'Register New Member')

@section('content')
    <div class="container">
        <form action="/members" method="post" id="createMember" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="panel bg-custom shadow-sm  mt-2">
                    <div class="row p-3">
                        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center my-4">
                            <label>Member No. <small><i>(auto generated)</i></small></label> <br>
                            <div id="member_no" class="d-flex flex-row justify-content-center align-items-center">
                                <span class="mno_blocks"></span>
                                <span class="mno_blocks"></span>
                                <span class="mno_blocks"></span>
                                -
                                <span class="mno_blocks"></span>
                                <span class="mno_blocks"></span>
                                <span class="mno_blocks"></span>
                                -
                                <span class="mno_blocks"></span>
                                <span class="mno_blocks"></span>
                                <span class="mno_blocks"></span>
                                -
                                <span class="mno_blocks"></span>
                                <span class="mno_blocks"></span>
                                <span class="mno_blocks"></span>
                                <span class="mno_blocks"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="member_no" id="member_no">
                <div class="panel bg-custom shadow-sm  mt-2">
                    <div class="panel-header">
                        <h3 class="display px-2 pt-3">Residential Info</h3>
                    </div>
                    <div class="row p-3">
                        <div class="form-group col-md-4">
                            <label for="county">County</label>
                            <select class="custom-select select2" name="county" id="county">
                                <option selected>Select county</option>
                                @foreach ($counties as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="sub-county">Sub-county</label>
                            <select class="custom-select select2" name="sub_county" id="sub-county">
                                <option selected>Select sub-county</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="ward">Ward</label>
                            <select class="custom-select select2" name="ward" id="ward">
                                <option selected>Select ward</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel bg-custom shadow-sm  mt-2">
                    <div class="panel-header">
                        <h3 class="display px-2 pt-3">Personal Particulars <small><i>(As per ID or Passport)</i></small>
                        </h3>
                    </div>
                    <div class="row p-3">
                        <div class="form-group col-md-12 row">
                            <label for="" class="col-12">Full name <small class="text-danger">*</small></label>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="firstname" id="firstname" class="form-control"
                                    placeholder="First Name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="middlename" id="middlename" class="form-control"
                                    placeholder="Middle Name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="lastname" id="lastname" class="form-control"
                                    placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender">Legal Gender</label>
                            <select class="custom-select" name="gender" id="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" id="dob" class="form-control" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="id_no">ID/Passport No.</label>
                            <input type="text" name="id_no" id="id_no" placeholder="ID/Passport Number" class="form-control"
                                required>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="">Passport size photo <span class="text-danger">*</span></label>
                            <div class="preview mb-2">
                                <div class="img-box">
                                    <img src="#" alt="" id="photo_img" class="img-fluid w-100 h-auto">
                                </div>
                            </div>
                            <input type="file" class="form-control-file personal img_upload" name="photo" placeholder=""
                                data-target="#photo_img">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="residential_address">Physical Address <small><i>(or Nearby
                                        Landmark)</i></small></label>
                            <input type="text" name="residential_address" id="residential_address"
                                placeholder="Physical Address (or Nearby Landmark)" class="form-control" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="education">Level of Education</label>
                            <select class="custom-select" name="education" id="education">
                                <option selected>Select one</option>
                                <option value="primary">Primary</option>
                                <option value="secondary">Secondary</option>
                                <option value="college">College</option>
                            </select>
                        </div>
                        <hr style="width: 80%;margin:20px auto">
                        <div class="col-12"></div>
                        <div class="form-group col-md-12 row">
                            <label for="" class="col-12">Next of Kin <small class="text-danger">*</small></label>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="nok_firstname" id="nok_firstname" class="form-control"
                                    placeholder="First Name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="nok_middlename" id="nok_middlename" class="form-control"
                                    placeholder="Middle Name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="nok_lastname" id="nok_lastname" class="form-control"
                                    placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="nok_relationship">Relationship</label>
                            <input type="text" name="nok_relationship" id="nok_relationship" class="form-control"
                                placeholder="Next of Kin relationship" required>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="nok_phone">Phone Number</label>
                            <input type="text" name="nok_phone" id="nok_phone" class="form-control"
                                placeholder="Next of Kin phone number" required>
                        </div>
                    </div>
                </div>
                <div class="panel bg-custom shadow-sm  mt-2">
                    <div class="panel-header">
                        <h3 class="display px-2 pt-3">About the Facility</h3>
                    </div>
                    <div class="row p-3">
                        <div class="form-group col-md-4">
                            <label for="facility_name">Name of Facility</label>
                            <input type="text" name="facility_name" id="facility_name" class="form-control"
                                placeholder="Name of Daycare/Home-care/Bureau" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="facility_type">Type of facility</label>
                            <select class="custom-select" name="facility_type" id="facility_type">
                                <option selected>Select type of facility</option>
                                <option value="daycare">Daycare</option>
                                <option value="bureau">Bureau</option>
                                <option value="homecare">Home-Care</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 d-none" id="other_facility_div">
                            <label for="other_facility">Type of Facility</label>
                            <input type="text" name="other_facility" id="other_facility" class="form-control"
                                placeholder="Type of facility">
                        </div>
                        <div class="form-group col-md-8 d-none">
                            <label for="facility_owner">Name of owner</label>
                            <input type="text" name="facility_owner" id="facility_owner" class="form-control"
                                placeholder="Name of owner of the facility">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="owner_gender">Gender</label>
                            <select class="custom-select" name="owner_gender" id="owner_gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="panel-header">
                                <h3 class="display px-2 pt-3">Registration & License status of the Facility</h3>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="start_date">Date it was Started</label>
                            <input type="date" name="start_date" id="start_date" class="form-control"
                                placeholder="Date the facility was Started" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="years_of_operation">No of years in operation</label>
                            <input type="text" name="years_of_operation" id="years_of_operation" class="form-control"
                                placeholder="No of years in operation" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="registration_status">Registration Status</label>
                            <select class="custom-select" name="is_registered" id="registration_status">
                                <option value="1">Registered</option>
                                <option value="0">Not Registered</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel bg-custom shadow-sm  mt-2">
                    <div class="panel-header">
                        <h3 class="display px-2 pt-3">Additional Information</h3>
                        <label for="">Who introduced you to M-toto</label>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="champion_name">Champion Name</label>
                            <input type="text" class="form-control" name="champion_name" id="champion_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="champion_phone">Champion Phone</label>
                            <input type="text" class="form-control" phone="champion_phone" id="champion_phone">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center py-4">
                <input type="submit" class="btn btn-primary px-5" value="Register">
            </div>
        </form>
    </div>
@stop
@section('javascript')
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $('select#facility_type').change(function(e) {
                e.preventDefault();
                var type = $(this).val();
                if (type == "other") {
                    $('#other_facility_div').removeClass('d-none');
                    $('input#other_facility').prop('required', true);
                } else {
                    $('#other_facility_div').addClass('d-none');
                    $('input#other_facility').prop('required', false)
                }
            });

            $('#start_date').change(function(e) {
                e.preventDefault();
                var start = $(this).val(),
                    now = new Date();

                var diff = dateDiff(start);
                $('#years_of_operation').val(diff);
            });

            $('button#submit').click(function(e) {
                e.preventDefault();
                $('form#createMember').submit();
            });
        });

        function dateDiff(startingDate, endingDate) {
            var startDate = new Date(new Date(startingDate).toISOString().substr(0, 10));
            if (!endingDate) {
                endingDate = new Date().toISOString().substr(0, 10); // need date in YYYY-MM-DD format
            }
            var endDate = new Date(endingDate);
            if (startDate > endDate) {
                var swap = startDate;
                startDate = endDate;
                endDate = swap;
            }
            var startYear = startDate.getFullYear();
            var february = (startYear % 4 === 0 && startYear % 100 !== 0) || startYear % 400 === 0 ? 29 : 28;
            var daysInMonth = [31, february, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

            var yearDiff = endDate.getFullYear() - startYear;
            var monthDiff = endDate.getMonth() - startDate.getMonth();
            if (monthDiff < 0) {
                yearDiff--;
                monthDiff += 12;
            }
            var dayDiff = endDate.getDate() - startDate.getDate();
            if (dayDiff < 0) {
                if (monthDiff > 0) {
                    monthDiff--;
                } else {
                    yearDiff--;
                    monthDiff = 11;
                }
                dayDiff += daysInMonth[startDate.getMonth()];
            }

            return yearDiff + ' Years ' + monthDiff + ' Months ' + dayDiff + ' Days';
        }

    </script>
@endsection
