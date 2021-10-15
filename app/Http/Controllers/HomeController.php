<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $role = Auth::user()->role;
        if ($role === "ADMIN") {
            return view('admin.home');
        } else if ($role === "HOD") {
            return view('hod.home');
        } else if ($role === "LAB_COORDINATOR") {
            return view('coordinator.home');
        } else if ($role === "LAB_TECHNICIAN") {
            return view('technician.home');
        }
    }

    public function profile() {
        return view('settings');
    }

    public function saveSettings(Request $request) {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
           'password'=> 'required|unique:users',
            'id' => 'required|unique:users',
        ]);
        $save = User::where('id', auth()->user()->id)->first();
        $save->first_name = $request['fname'];
        $save->last_name = $request['lname'];
        $save->phone_no = $request['phone'];
        $save->id_number = $request['id'];
        $save->password = $request['password'];
        $save->save();
        return redirect()->back()->with(['message' => 'Profile Updated successfully']);
    }
}
