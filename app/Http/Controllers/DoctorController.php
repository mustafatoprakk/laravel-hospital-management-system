<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Department;
use App\Models\Hospital;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("admin");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view("doctor.index", compact("doctors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hospitals = Hospital::all();

        return view("doctor.create", compact("hospitals"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {

        $filname = "";
        if ($request->has("image")) {
            $image = $request->file("image");
            $filname = time() . '.' . $image->getClientOriginalExtension();
            $location = "profiles/";
            $image->move($location, $filname);
        }

        $doctor = Doctor::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "gender" => $request->gender,
            "hospital_id" => $request->hospital,
            "department_id" => $request->department,
            "image" => $filname,
        ]);

        if ($request->has("hospital")) {
            $doctor->hospital()->attach($request->hospital);
        }

        if ($request->has("department")) {
            $doctor->department()->attach($request->department);
        }

        return redirect()->back()->with("message", "Doctor created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }

    public function getDepartment(Request $request)
    {
        $data["department"] = Department::from("departments as D")
            ->select("D.name as name", "D.id as id")
            ->join("hospital_department as HD", "HD.department_id", "D.id")
            ->join("hospitals as H", "H.id", "HD.hospital_id")
            ->where("H.id", $request->hospital)
            ->get();

        return response()->json($data);
    }
}
