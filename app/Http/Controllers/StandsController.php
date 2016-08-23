<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

use App\Stand;
use App\Event;

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

    public function reserve(Stand $stand)
    {
    	$stand->reserve();
    	return redirect('/event/' . $stand->event_id);
    }

    public function showall(Event $event)
    {  
        $event->load('stands.user');

        $arr = array();
        $keys = ['ground' => 0, 'second'=> 1, 'third' => 2];
        $arr['mapwidth'] = "1000";
        $arr['mapheight'] = "600";
    
        $arr['levels'] = array();
        $arr['levels'][0]["id"] = "basement-floor";
        $arr['levels'][0]["title"] = "Ground Floor";
        $arr['levels'][0]["map"] = "images/mall/mall-underground.svg";
        $arr['levels'][0]["minimap"] = "images/mall/mall-underground-mini.jpg";
        $arr['levels'][1]["id"] = "ground-floor";
        $arr['levels'][1]["title"] = "Second Floor";
        $arr['levels'][1]["map"] = "images/mall/mall-ground.svg";
        $arr['levels'][1]["minimap"] = "images/mall/mall-ground-mini.jpg";
        $arr['levels'][2]["id"] = "first-floor";
        $arr['levels'][2]["title"] = "Third Floor";
        $arr['levels'][2]["map"] = "images/mall/mall-level1.svg";
        $arr['levels'][2]["minimap"] = "images/mall/mall-level1-mini.jpg";
       
        $i['ground'] = 0;
        $i['second'] = 0;
        $i['third'] = 0;

        foreach($event->stands as $stand) {

        if(empty($stand->user_id)) {

            if(Auth::guest()) {
                $reserve_link = "/reserve/" . $event->id . "/" . $stand->id;
            } else {
                $reserve_link = "/stand/reserve/" . $stand->id;
            }
            

            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["id"] = strtolower( str_replace(" ", "_",$stand['title'] . "_" . $stand['type'] . "_" . $i[$stand['type']]  ));
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["title"] = $stand['title'];
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["about"] = ucfirst($stand['type']) . " Floor";
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["description"] = "<a href='{$reserve_link}'>Reserve</a> &nbsp; &nbsp; &nbsp;" . number_format($stand['price'],2);
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["thumbnail"] = "images/thumbs/default.jpg";
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["x"] = $stand['posx'];
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["y"] = $stand['posy'];
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["clothing"] = "clothing";
                $i[$stand['type']]++;

            
        } else {

            $download = "";
            if(count($stand->user->documents) > 0) {
                 $download = "<ul>";
                foreach($stand->user->documents as $document) {
                      $download .= "<li><a download ng-click='addDocumentDownload($stand->id)' href='/documents/$document->path'>$document->path</a></li>";
                }
                $download .= "<ul>";
            }
            
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["id"] = strtolower( str_replace(" ", "_",$stand['title'] . "_" . $stand['type'] . "_" . $i[$stand['type']]  ));
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["title"] = $stand->user->name;
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["about"] = $stand->user->email . ', ' . $stand->user->phone;
            if($download) {
                $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["description"] = $download;
            }
            
            if(empty($stand->user->logo)) {
                $stand->user->logo = "nologo.jpg";
            } 
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["thumbnail"] = "/images/logo/" . $stand->user->logo;
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["x"] = $stand['posx'];
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["y"] = $stand['posy'];
            $arr['levels'][$keys[$stand['type']]]["locations"][$i[$stand['type']]]["clothing"] = "clothing";
                $i[$stand['type']]++;
         }
       }
        return $arr;
    }
}
