<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\Facades\DataTables;

class MembersController extends Controller
{

    public function __construct()
    {
        $this->universal_data = [];
        $this->universal_data['user'] = Auth::user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = [];

        if ($request->ajax()) {
            $status = $request->status;
            $members = Member::orderBy('id', 'DESC');
            if ($status != "all") {
                $members->where('status', $status);
            }

            $members = $members->get();
            return DataTables::of($members)
                ->editColumn('member_no', function ($row) {
                    return !empty($row->member_no) ? $row->member_no : "N/A";
                })
                ->editColumn('name', function ($row) {
                    return $row->firstname . "  " . $row->lastname;
                })
                ->editColumn('dob', function ($row) {
                    return Date('jS F Y', strtotime($row->dob));
                })
                ->editColumn('date', function ($row) {
                    return Date('jS F Y', strtotime($row->created_at));
                })
                ->editColumn('facility', function ($row) {
                    return $row->facility_name . " (" . !empty($row->facility_type) ? ucfirst($row->facility_type) : ucfirst($row->other_facility) . ")";
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == "pending") {
                        return "<span class='badge badge-info text-white  px-4 py-1'>Pending</span>";
                    } elseif ($row->status == "approved") {
                        return "<span class='badge badge-success px-4 py-1'>Approved</span>";
                    } elseif ($row->status == "suspended") {
                        return "<span class='badge badge-danger px-4 py-1'>Suspended</span>";
                    }
                })
                ->editColumn('action', function ($row) {
                    return "<a class='btn btn-primary btn-xs' href='/members/" . $row->id . "'>View</a>";
                })
                ->rawColumns(['member_no', 'name', 'dob', 'facility', 'date', 'status', 'action'])
                ->make(true);
        }
        return view('members.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        if (!$user->hasPermissionTo('register-members')) {
            return redirect()->action([MembersController::class, 'index']);
        }
        $data = [];
        $data['counties'] =     County::get();
        return view('members.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {

            $member = new Member;
            $inputs = $request->except(['_token', 'photo', 'years_of_operation', 'sub_county', 'ward']);

            foreach ($inputs as $key => $value) {
                $member->$key = $value;
            }

            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->storeAs('/members/photos', Date('ymdhi') . $request->file('photo')->getClientOriginalName(), 'public');
                $member->photo = $path;
            }

            $member->save();
            flash('Member registered successfully!')->success();
            //code...
        } catch (\Throwable $th) {
            flash(trans('message.error'))->error();
            \Log::error($th);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
        $data = [];
        $data['member'] = $member;
        return view('members.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }
    public function approve(Request $request)
    {
        $user = Auth::user();
        if (!$user->hasPermissionTo('activate-member')) {
            return back();
        }
        try {
            $member = Member::find($request->id);
            $member->status = "activated";
            $member->save();
            echo json_encode(['success' => 1]);
            return;
        } catch (\Throwable $th) {
            //throw $th;
            \Log::error($th);
            echo json_encode(['success' => 0]);
            return;
        }
    }
    public function reject(Request $request)
    {
        $user = Auth::user();
        if (!$user->hasPermissionTo('activate-member')) {
            return back();
        }
        try {
            $member = Member::find($request->id);
            $member->status = "rejected";
            $member->save();
            echo json_encode(['success' => 1]);
            return;
        } catch (\Throwable $th) {
            //throw $th;
            \Log::error($th);
            echo json_encode(['success' => 0]);
            return;
        }
    }
    public function suspend(Request $request)
    {
        $user = Auth::user();
        if (!$user->hasPermissionTo('activate-member')) {
            return back();
        }
        try {
            $member = Member::find($request->id);
            $member->status = "suspended";
            $member->save();
            echo json_encode(['success' => 1]);
            return;
        } catch (\Throwable $th) {
            //throw $th;
            \Log::error($th);
            echo json_encode(['success' => 0]);
            return;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
