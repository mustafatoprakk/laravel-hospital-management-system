<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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

    public function doctors()
    {
        $doctors = User::where("role", 1)->get();
        return view("user.doctors", compact("doctors"));
    }

    public function doctorCreate()
    {
        return view("user.doctorsCreate");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view("user.index", compact("user"));
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
    public function store(StoreUserRequest $request)
    {



        User::create([
            "name" => $request->name,
            "email" => "$request->email",
            "password" => Hash::make("12345678"),
            "phone" => $request->phone,
            "role" => 1,
        ]);

        return redirect()->back()->with("message", "User created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $user->name = $request->u_name;
        $user->email = $request->u_email;
        $user->phone = $request->u_phone;

        if ($request->u_password) {
            $user->password = Hash::make($request->u_password);
        }

        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $filname = time() . '.' . $image->getClientOriginalExtension();
            $location = "profiles/";
            $image->move($location, $filname);
            $user->image = $filname;

            if ($request->oldImage != "") {
                File::delete("profiles/$request->oldImage");
            }
        }

        $user->update();
        return redirect()->back()->with("message", "User updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
