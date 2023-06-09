<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHourRequest;
use App\Models\Hour;
use Illuminate\Http\Request;

class HourController extends Controller
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
        $hours = Hour::all();
        return view("hour.index", compact("hours"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("hour.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHourRequest $request)
    {
        Hour::create($request->validated());
        return redirect()->back()->with("message", "Hour created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Hour $hour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hour $hour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hour $hour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hour $hour)
    {
        //
    }
}
