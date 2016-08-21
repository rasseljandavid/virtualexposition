<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Stand;

class StandsController extends Controller
{
    public function addStandVisit(Request $request)
    {
    	$input = $request->all();
    	$stand = Stand::find($input['id']);

    	$stand->totalVisit = $stand->totalVisit + 1;
    	$stand->save();
    }

    public function addDocumentDownload(Request $request)
    {
    	$input = $request->all();
    	$stand = Stand::find($input['id']);

    	$stand->totalDownload = $stand->totalDownload + 1;
    	$stand->save();
    }
}
