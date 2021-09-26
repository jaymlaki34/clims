<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function users() {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $data = array(
            "title" => "Users",
            "users" => $users,
            "roles" => ['ADMIN', 'HOD', 'LAB_TECHNICIAN', 'LAB_COORDINATOR']
        );
        return view('admin.usersList')->with($data);
    }

    function RegisterUser(Request $request) {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'phone_no' => 'required|min:10',
            'role' => 'required',
        ]);
        $capital_lname = strtoupper($request->last_name);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->phone_no = $request->phone_no;
        $user->role = $request->role;
        $user->password = \Hash::make($capital_lname);
        $save = $user->save();
        if ($save) {
            $classA = new AdminController();
            return $classA->users();
            return redirect()->back()->with('success', 'Staff saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Staff failed to save');
        }
    }
}