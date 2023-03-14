<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Http\Requests\StoreHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;
use App\Models\Department;

class HospitalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals = Hospital::all();
        return view("hospital.index", compact("hospitals"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view("hospital.create", compact("departments"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHospitalRequest $request)
    {
        $hospital = Hospital::create([
            "name" => $request->name,
        ]);

        if ($request->has("department")) {
            $hospital->department()->attach($request->department);
        }

        return redirect()->back()->with("message", "Hospital created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital)
    {
        $departments = Department::all();
        return view("hospital.edit", compact("hospital", "departments"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHospitalRequest $request, Hospital $hospital)
    {
        $hospital->update([
            "name" => $request->name,
        ]);

        if ($request->has("department")) {
            $hospital->department()->sync($request->department);
        }

        return redirect()->back()->with("message", "Hospital updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital)
    {
        //
    }
}
