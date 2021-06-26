<?php

namespace App\Http\Controllers;
use App\Models\bus_routes;
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
            return response()->json(['message'=> 'No Bus Schedules Details'], 404);
        }
        
    }

    //Insert Function
    public function store(Request $request)
    {
        $request->validate([
            'bus_route_id'=>'required',
            'direction'=>['required','max:191'],
            'start_timestamp'=>['required','date_format:H:i','max:191'],
            'end_timestamp'=>['required','date_format:H:i','max:191'],
        ]);

        //Get bus_routesTable Foreign Key
        $broute_id = $request->bus_route_id;
        $bus_routes = bus_routes::find($broute_id);

        $direction = $request->direction;

        $bus_schedules = new bus_schedules;
        if($bus_routes)
         {
             if($direction=='forward' || $direction=='revers')
             {
               $bus_schedules->bus_route_id = $request->bus_route_id;
               $bus_schedules->direction = $request->direction;
               $bus_schedules->start_timestamp = $request->start_timestamp;
               $bus_schedules->end_timestamp = $request->end_timestamp;

               $bus_schedules->save();
               return response()->json(['message'=>'Added New Bus Schedules Successfully'], 200);
             } 
               else{
    
                return response()->json(['message'=>'invalied the status, Please enter the forward or revers'], 404);
        
                } 
         }

        else{

            return response()->json(['message'=>'bus_route_id Not Found'], 404);

        } 
    }

    //Update Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'bus_route_id'=>'required',
            'direction'=>['required','max:191'],
            'start_timestamp'=>['required','date_format:H:i','max:191'],
            'end_timestamp'=>['required','date_format:H:i','max:191'],
        ]);

        //Get bus_routesTable Foreign Key
        $broute_id = $request->bus_route_id;
        $bus_routes = bus_routes::find($broute_id);

        $direction = $request->direction;
  
        $bus_schedules = bus_schedules::find($id);
        if($bus_schedules)
        {
           if($bus_routes)
            {
             if($direction=='forward' || $direction=='revers')
               {
                 $bus_schedules->bus_route_id = $request->bus_route_id;
                 $bus_schedules->direction = $request->direction;
                 $bus_schedules->start_timestamp = $request->start_timestamp;
                 $bus_schedules->end_timestamp = $request->end_timestamp;	
           
                 $bus_schedules->update();
                 return response()->json(['message'=>'Updated Successfully'], 200);
                } 
                else{
     
                 return response()->json(['message'=>'invalied the status, Please enter the forward or revers'], 404);
         
                 } 

            }

            else{
    
                return response()->json(['message'=>'bus_route_id Not Found'], 404);
    
            } 

         }
        else
        {
                return response()->json(['message'=>'Not Update Bus_Schedules Details'], 404);
        }
        
    }

    //Delete Function
    public function destroy($id)
    {
        $bus_schedules = bus_schedules::find($id);
        if($bus_schedules)
        {
            $bus_schedules->delete();
            return response()->json(['message'=>'Deleted Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Delete Bus_Schedules Details'], 404);
        }
    }
}
