<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
}
