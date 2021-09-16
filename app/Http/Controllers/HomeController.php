<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\role;
use App\User;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function settings()
    {
        return view('settings');
    }

    public function saveSettings(Request $request)
    {
        $request->validate([
            'name' => 'required',

            'phone' => 'required',
            'id' => 'required|unique:users',
        ]);

        $save = User::where('id',auth()->user()->id)->first();
        $save->name = $request['name'];
      
        $save->phone_number = $request['phone'];
        $save->id_number = $request['id'];
        $save->save();

        return redirect()->back()->with(['message'=>'Profile Updated successfully']);

    }
}
