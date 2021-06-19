@extends('layouts.app')

@section('title', 'Registered Members')

@section('content')
    <div class="container">
        <div class="panel bg-custom shadow-sm mt-2">
            <form action="" class="row p-3">
                <div class="col-md-12">
                    <span class="text-primary display"><i class="fa fa-filter" aria-hidden="true"></i> Filter </span>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Status</label>
                    <select class="custom-select" name="" id="filter_status">
                        <option value="all">All</option>
                        <option value="pending">Pending</option>
                        <option value="activated">Activated</option>
                        <option value="suspended">Suspended</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="panel bg-custom shadow-sm mt-2 p-3">
            <table class="table table-condensed table-bordered text-center table-responsive-md" id="tbl_members" style="width: 100% !important">
                <thead>
                    <tr>
                        <th>Member #</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Facility</th>
                        <th>Status</th>
                        <th>Member Registeration Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@stop
@section('javascript')
    <script>
        $(document).ready(function() {

            $('#filter_status').change(function (e) { 
                e.preventDefault();
                tbl_members.ajax.reload();
                // alert($(this).val());
            });

            tbl_members = $('table#tbl_members').DataTable({
                dom: "itp",
                ordering: true,
                ajax: {
                    url: "/members",
                    data: {
                        status : $('#filter_status').val(),
                    },
                },
                columns: [{
                    data: "member_no",
                }, {
                    data: "name"
                }, {
                    data: "dob"
                }, {
                    data: "facility"
                }, {
                    data: "status"
                }, {
                    data: "date"
                }, {
                    data: "action"
                }]
            });
        });

    </script>
@endsection
