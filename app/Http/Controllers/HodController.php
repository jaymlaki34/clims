<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratoy;
class HodController extends Controller
{
        public function Reports() {
            $Reports = Laboratoy::where('is_active', '=', 1)->get();
            $data = array(
                "title" => "Laboratories",
                "labs" => $Reports
            );
            return view('hod.Report')->with($data);
        }




}
