<?php

namespace App\Http\Controllers;

use App\Models\bus_schedules;
use Illuminate\Http\Request;

class bus_schedulesController extends Controller
{
    //Get Function
    public function index()
    {
        $bus_schedules = bus_schedules::all();
        return response()->json(['bus_schedules'=> $bus_schedules], 200);
    }

    //Show Function
    public function show($id)
    {
        $bus_schedules = bus_schedules::find($id);

        if($bus_schedules)
        {
            return response()->json(['bus_schedules'=> $bus_schedules], 200);
        }
        else
        {
            return response()->json(['message'=> 'No bus_schedules Details'], 404);
        }
        
    }

    //Insert Function
    public function store(Request $request)
    {
        $request->validate([
            'bus_route_id'=>'required|max:191',
            'direction'=>'required|max:191',
            'start_timestamp'=>'required|max:191',
            'end_timestamp'=>'required|max:191',
        ]);
  
        $bus_schedules = new bus_schedules;
        $bus_schedules->bus_route_id = $request->bus_route_id;
        $bus_schedules->direction = $request->direction;
        $bus_schedules->start_timestamp = $request->start_timestamp;
        $bus_schedules->end_timestamp = $request->end_timestamp;

        $bus_schedules->save();
        return response()->json(['message'=>'Added Successfully'], 200);
    }

    //Update Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'bus_route_id'=>'required|max:191',
            'direction'=>'required|max:191',
            'start_timestamp'=>'required|max:191',
            'end_timestamp'=>'required|max:191',
        ]);
  
        $bus_schedules = bus_schedules::find($id);
        if($bus_schedules)
        {
            $bus_schedules->bus_route_id = $request->bus_route_id;
            $bus_schedules->direction = $request->direction;
            $bus_schedules->start_timestamp = $request->start_timestamp;
            $bus_schedules->end_timestamp = $request->end_timestamp;	
           
            $bus_schedules->update();
            return response()->json(['message'=>'Update Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Update bus_schedules Details'], 404);
        }
        
    }

    //Delete Function
    public function destroy($id)
    {
        $bus_schedules = bus_schedules::find($id);
        if($bus_schedules)
        {
            $bus_schedules->delete();
            return response()->json(['message'=>'Delete Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Delete bus_schedules Details'], 404);
        }
    }
}
