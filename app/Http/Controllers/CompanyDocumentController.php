<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CompanyDocument;

use Illuminate\Support\Facades\Auth;

class CompanyDocumentController extends Controller
{
    public function addDocument(Request $request)
    {
    	$file = $request->file('file');
    	$name = time() . $file->getClientOriginalName();
    	$file->move('documents', $name);

    	CompanyDocument::create([
    		'user_id' => Auth::user()->id,
    		'path'    => $name
    	]);
    }
}
