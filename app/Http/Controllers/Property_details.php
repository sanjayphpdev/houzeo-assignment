<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Log;

class Property_details extends Controller
{
    public function index()
    {
		return view('property_listing');
    }

    public function form_validation()
    {
        return view('form_validation');
    }
	
	public function savePropertyDetail(Request $request)
	{
		 Log::info("Request Recives To validation ",['request'=>$request->input()]);
		 
		 $validated = $request->validate([
			'full_name' => 'required|regex:/^[a-zA-Z]+$/u|min:4',
			'phone_number' => 'nullable|numeric|min:10',
			'dob' => 'required|date|before:-15 years',
		]);

		$data["full_name"] = $request->input("full_name");
		$data["phone_number"] = $request->input("phone_number");
		$data["email"] = ($request->has("email"))?$request->input("email"):"";
		$data["dob"] = $request->input("dob");
		
		$isInserted = DB::table('user_basic_details')->insert($data);
		Log::info("Inserting New Record",['data'=>$data,'status'=>$isInserted]);
		
		//-- Flash Message will come here..
		dd($isInserted);
		
	}
}
