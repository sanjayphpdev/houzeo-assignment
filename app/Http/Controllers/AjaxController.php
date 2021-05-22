<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Log;

class AjaxController extends Controller
{
		 /**
     * Fetches properties
     * @param Request $request
     */
    public function viewPropertyForDatatable(Request $request) {
		//Get params
		Log::info("Request Recives from dataTable ",['request'=>$request->input()]);
        $start = $request->input('start');
        $length = $request->input('length');
        $draw = $request->input('draw');
        $totalRecords = 0;
        $filteredRecords = 0;
        $outputData = array();
        //Get total records
        $totalRecords = DB::select("select COUNT(ats.id) as totalRecord from assigned_tasks ats inner join property_location pl on ats.house_id = pl.house_id");

        //Initialize filtered count
        $filteredRecords = $totalRecords;
		
		//Get data
		$listingHandler = DB::select(DB::raw("select ats.id,ats.title,ats.updated_at, pl.house_id, concat(pl.street,',',pl.city,',',pl.zip,',',pl.county) as proprtyLocation from assigned_tasks ats inner join property_location pl on ats.house_id = pl.house_id LIMIT $start,$length;"));
		
        //Set data for datatable
        if(count($listingHandler) > 0) {
            foreach($listingHandler as $property) {
                //Generate new array object
                $nestedData = array();
                $nestedData[] = ++$start;
                $nestedData[] = $property->house_id;
                $nestedData[] = $property->proprtyLocation;
				$nestedData[] = $property->id;
                $nestedData[] = $property->title;
                $nestedData[] = $property->updated_at;

                //Assign to output
                $outputData["data"][] = $nestedData;
            }
        }
        else {
            $outputData["data"] = array();
        }

        //Prepare output
		$outputData["draw"] = $draw;
        $outputData["recordsTotal"] = $totalRecords;
        $outputData["recordsFiltered"] = $filteredRecords;

        //Prepare Response
        return json_encode($outputData);
    }
}