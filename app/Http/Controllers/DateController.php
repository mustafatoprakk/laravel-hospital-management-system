<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Http\Requests\StoredateRequest;
use App\Http\Requests\UpdatedateRequest;
use App\Models\Hour;

class DateController extends Controller
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
        $dates = Date::all();
        return view("date.index", compact("dates"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hours = Hour::all();
        return view("date.create", compact("hours"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredateRequest $request)
    {
        foreach ($request->date as $key => $value) {
            $day = date("l", strtotime($request->date[$key]));
            $date = new Date();
            $date->date = $request->date[$key];
            $date->day = $day;
            $date->save();

            if ($request->hour) {
                $date->hour()->sync($request->hour);
            }
        }

        return redirect()->back()->with([
            "message" => "Date created",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Date $date)
    {
        $hours = Hour::all();
        return view("date.edit", compact("date", "hours"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Date $date)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedateRequest $request, Date $date)
    {
        $day = date("l", strtotime($request->date));
        $date->update([
            "date" => $request->date,
            "day" => $day,
        ]);

        if ($request->hour) {
            $date->hour()->sync($request->hour);
        }

        return redirect()->back()->with("message", "Date updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Date $date)
    {
        //
    }
}
