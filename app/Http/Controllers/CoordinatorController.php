<?php

namespace App\Http\Controllers;

use App\Models\Laboratoy;
use Illuminate\Http\Request;

class CoordinatorController extends Controller {
    public function labs() {
        $labs = Laboratoy::where('is_active', '=', 1)->get();
        $data = array(
            "title" => "Laboratories",
            "labs" => $labs
        );
        return view('coordinator.LabList')->with($data);
    }

    function RegisterLabs(Request $request) {
        $request->validate([
            'laboratory_name' => 'required',
        ]);
        $user = new Laboratoy();
        $user->laboratory_name = $request->laboratory_name;
        $user->date_added = date('Y-m-d');
        $save = $user->save();
        if ($save) {
            return redirect()->back()->with('success', 'Staff saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Staff failed to save');
        }
    }
}