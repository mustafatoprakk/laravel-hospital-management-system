<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Date;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Hour;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
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
        return view("appointment.index", compact("hospitals"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function makeAppointment(Request $request)
    {
        $doctor = Doctor::where("id", $request->doctor)->first();
        $dates = Date::all();
        return view("appointment.makeAppointment", compact("doctor", "dates"));
    }

    public function getHours(Request $request)
    {
        $data["hours"] = Hour::from("hours as H")
            ->select("H.hour as hour", "H.id as id")
            ->join("date_hour as DH", "DH.hour_id", "id")
            ->join("dates as D", "D.id", "DH.date_id")
            ->where("D.id", $request->appointmentDate)
            ->get();

        return response()->json($data);
    }
}
