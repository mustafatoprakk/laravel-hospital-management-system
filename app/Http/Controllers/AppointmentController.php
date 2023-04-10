<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Date;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Hour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function create(Request $request)
    {
        $doctor = Doctor::where("id", $request->doctor)->first();
        $dates = Date::all();
        return view("appointment.create", compact("doctor", "dates"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $user = Auth::user()->id;
        Appointment::create([
            "user_id" => $user,
            "doctor_id" => $request->doctor_id,
            "date_id" => $request->date,
            "hour_id" => $request->hour,
        ]);

        return to_route("appointment.index");
    }

    public function getHours(Request $request)
    {
        $data["hours"] = Hour::from("hours as H")
            ->select("H.hour as hour", "H.id as id")
            ->join("date_hour as DH", "DH.hour_id", "id")
            ->join("dates as D", "D.id", "DH.date_id")
            ->where("D.id", $request->appointmentDate)
            ->orderBy("id", "ASC")
            ->get();

        return response()->json($data);
    }
}
