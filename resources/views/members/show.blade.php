@extends('layouts.app')

@section('title', $member->firstname . ' ' . $member->lastname)

@section('content')
    <div class="member-profiles px-3 py-3">
        <div class="container">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4">
                        <div class="card bg-custom h-100">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="position-relative">
                                        @if (empty($member->photo) || $member->photo == '')
                                            <div class="rounded-circle flex-center bg-secondary my-2 p-2 shadow edit-pic"
                                                style="width:150px;height:150px;">
                                                <h1 class="display-4 text-light"
                                                    style="font-family: 'Yusei Magic', sans-serif;">
                                                    <span>{{ $member->firstname[0] }}</span><span>{{ $member->lastname[0] }}</span>
                                                </h1>
                                            </div>
                                        @else
                                            <img src="{{ asset('storage/' . $member->photo) }}"
                                                class="rounded-circle profile-pic edit-pic" width="150">
                                        @endif
                                        {{-- <div class="prof-img-div flex-center">
                                                <button class="btn bg-transparent" data-toggle="modal"
                                                    data-target="#editStaffProfilePic" type="button">
                                                    <i class="fa fa-camera-retro" aria-hidden="true"></i>
                                                </button>
                                            </div> --}}
                                    </div>
                                    <div class="mt-3">
                                        <h4 class="text-dark">{{ $member->firstname . ' ' . $member->lastname }}</h4>
                                        <p class="text-secondary mb-1">{{ $member['position'] }}</p>
                                        <p class="text-muted font-size-sm mb-1">
                                            @if ($member->status == 'pending')
                                                <span class='badge badge-info text-white  px-4 py-1'>Pending</span>
                                            @elseif ($member->status == 'activated')
                                                <span class='badge badge-success px-4 py-1'>Active</span>
                                            @elseif ($member->status == 'suspended')
                                                <span class='badge badge-danger px-4 py-1'>Suspended</span>
                                                 @elseif ($member->status == 'rejected')
                                                <span class='badge badge-dark px-4 py-1'>Rejected</span>
                                            @endif
                                        </p>
                                        <p class="text-muted font-size-sm mb-1">
                                            Gender : {{ ucfirst($member->gender) }} <br>
                                            Age: {{ \Carbon\Carbon::createFromDate($member->dob)->age }} years
                                        </p>
                                        {{-- <a href="/member/{{ $member->id }}/edit" class="btn btn-primary btn-block">
                                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                            Edit Details
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card bg-custom mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->firstname . ' ' . $member->middlename . ' ' . $member->lastname }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Member No.</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ !empty($member->member_no) ? $member->member_no : 'N/A' }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ID/Passport No</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->id_no }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Physical Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->residential_address }}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Education Level</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ ucfirst($member->education) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters-sm mt-3">
                        <div class="col-sm-6 mb-3">
                            <div class="card bg-custom h-100">
                                <div class="card-body">
                                    <h6 class="bg-secondary text-white p-2 mb-3">
                                        Next of Kin Info
                                    </h6>
                                    <small>Name</small>
                                    <div class="mb-3 text-bold">
                                        {{ $member->nok_firstname . ' ' . $member->nok_middlename . ' ' . $member->nok_lastname }}
                                    </div>

                                    <small>Phone</small>
                                    <div class="mb-3 text-bold">
                                        {{ $member->nok_phone }}
                                    </div>
                                    <small>Relationship</small>
                                    <div class="mb-3 text-bold">
                                        {{ ucfirst($member->nok_relationship) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card bg-custom h-100">
                                <div class="card-body">
                                    <h6 class="bg-secondary text-white p-2 mb-3">
                                        Facility Info
                                    </h6>
                                    <small>Name</small>
                                    <div class="mb-3 text-bold">
                                        {{ $member->facility_name }}
                                    </div>

                                    <small>Facility Type</small>
                                    <div class="mb-3 text-bold">
                                        {{ !empty($member->facility_type) ? ucfirst($member->facility_type) : ucfirst($member->other_facility) }}
                                    </div>
                                    <small>Facility Owner</small>
                                    <div class="mb-3 text-bold">
                                        {{ !empty($member->facility_owner) ? ucfirst($member->facility_owner) : 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters-sm mt-3">
                        @can('activate-member')
                            @if ($member->status == 'pending')
                                <div class="panel bg-custom my-3 mb-4 pb-4">
                                    <div class="panel-content">
                                        <div class="panel-tab flex-center row">
                                            <div class="col-md-4 my-3">
                                                <a href="javascript:void(0)" class="approve-box btnApproveMember" id="btnApproveMember">
                                                    <div class="border-0 shadow rounded bg-custom">
                                                        <div class="card-body flex-center flex-column" style="height: 240px">
                                                            <h4 class="card-title mb-4"><i
                                                                    class="fa fa-check-circle text-success display-3"
                                                                    aria-hidden="true"></i></h4>
                                                            <p class="card-text display">Activate Member</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-4 my-3">
                                                <a href="javascript:void(0)" class="approve-box" id="btnRejectMember">
                                                    <div class="border-0 shadow rounded bg-custom">
                                                        <div class="card-body flex-center flex-column" style="height: 240px">
                                                            <h4 class="card-title mb-4"> <i
                                                                    class="fa fa-times-circle display-3 text-danger"
                                                                    aria-hidden="true"></i> </h4>
                                                            <p class="card-text display">Reject Member</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($member->status == "activated")
                                <div class="panel bg-custom my-3 mb-4 pb-4">
                                    <div class="panel-content">
                                        <div class="panel-tab flex-center row">
                                            <div class="col-md-4 my-3">
                                                <a href="javascript:void(0)" class="approve-box" id="btnSuspendMember">
                                                    <div class="border-0 shadow rounded bg-custom">
                                                        <div class="card-body flex-center flex-column" style="height: 240px">
                                                            <h4 class="card-title mb-4"> <i
                                                                    class="fa fa-times-circle display-3 text-danger"
                                                                    aria-hidden="true"></i> </h4>
                                                            <p class="card-text display">Suspend Member</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($member->status == "rejected")
                                <div class="panel bg-custom my-3 mb-4 pb-4">
                                    <div class="panel-content">
                                        <div class="panel-tab flex-center row">
                                            <div class="col-md-4 my-3">
                                                <a href="javascript:void(0)" class="approve-box btnApproveMember" id="">
                                                    <div class="border-0 shadow rounded bg-custom">
                                                        <div class="card-body flex-center flex-column" style="height: 240px">
                                                            <h4 class="card-title mb-4"><i
                                                                    class="fa fa-check-circle text-success display-3"
                                                                    aria-hidden="true"></i></h4>
                                                            <p class="card-text display">Activate Member</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- hidden --}}
    <input type="hidden" id="member_id" value="{{ $member->id }}">
@stop
@section('javascript')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.btnApproveMember').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Please confirm member approval!',
                    showCancelButton: true,
                    confirmButtonText: `Approve`,
                    icon: "warning",
                    confirmButtonColor: '#38c172',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "/members/approve",
                            data: {
                                id: $('#member_id').val()
                            },
                            success: function(response) {
                                var resp = JSON.parse(response);
                                if (resp.success == 1) {
                                    Swal.fire('Member activated Successfully!', '',
                                        'success');
                                    setTimeout(() => {
                                        location.reload();
                                    }, 300);

                                } else {
                                    Swal.fire('Something went wrong! Try again later!',
                                        '',
                                        'error');
                                }
                            }
                        });

                    }
                })
            }); 
            
            $('#btnSuspendMember').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Please confirm member suspension!',
                    showCancelButton: true,
                    confirmButtonText: `Suspend`,
                    icon: "warning",
                    confirmButtonColor: '#ffed4a',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "/members/suspend",
                            data: {
                                id: $('#member_id').val()
                            },
                            success: function(response) {
                                var resp = JSON.parse(response);
                                if (resp.success == 1) {
                                    Swal.fire('Member suspended Successfully!', '',
                                        'success');
                                    setTimeout(() => {
                                        location.reload();
                                    }, 300);

                                } else {
                                    Swal.fire('Something went wrong! Try again later!',
                                        '',
                                        'error');
                                }
                            }
                        });

                    }
                })
            });
            
            $('#btnRejectMember').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Please confirm member suspension!',
                    showCancelButton: true,
                    confirmButtonText: `Reject`,
                    icon: "warning",
                    confirmButtonColor: '#e3342f',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "/members/reject",
                            data: {
                                id: $('#member_id').val()
                            },
                            success: function(response) {
                                var resp = JSON.parse(response);
                                if (resp.success == 1) {
                                    Swal.fire('Member rejected Successfully!', '',
                                        'success');
                                    setTimeout(() => {
                                        location.reload();
                                    }, 300);

                                } else {
                                    Swal.fire('Something went wrong! Try again later!',
                                        '',
                                        'error');
                                }
                            }
                        });

                    }
                })
            });
        });

    </script>
@endsection
