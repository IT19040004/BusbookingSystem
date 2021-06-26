<?php

namespace App\Http\Controllers;
use App\Models\busTable;
use App\Models\bus_routes;
use App\Models\routes;
use Illuminate\Http\Request;

class bus_routesController extends Controller
{
    //Get Function
    public function index()
    {
        $bus_routes = bus_routes::all();
        return response()->json(['bus_routes'=> $bus_routes], 200);
    }

    //Show Function
    public function show($id)
    {
        $bus_routes = bus_routes::find($id);

        if($bus_routes)
        {
            return response()->json(['bus_routes'=> $bus_routes], 200);
        }
        else
        {
            return response()->json(['message'=> 'No Bus Routes Details'], 404);
        }
        
    }

    //Insert Function
    public function store(Request $request)
    {
        $request->validate([
            'bus_id'=>'required',
            'route_id'=>'required',
            'status'=>['required','max:191'],
        ]);

        //Get busTable Foreign Key
        $b_id = $request->bus_id;
        $busTable = busTable::find($b_id);

        //Get routesTable Foreign Key
        $r_id = $request->route_id;
        $routes = routes::find($r_id);

        $status = $request->status;
  
        $bus_routes = new bus_routes;
        if($routes)
        {
           if($busTable)
            {
                if($status=='active' || $status=='blocked')
                {
                  $bus_routes->bus_id = $request->bus_id;
                  $bus_routes->route_id = $request->route_id;
                  $bus_routes->status = $request->status;
                  $bus_routes->save();
                  return response()->json(['message'=>'Added New Bus Routes Successfully'], 200);
                }
                else{

                    return response()->json(['message'=>'invalied the status, Please enter the active or blocked'], 404);
            
                     }
            }
            else{

                return response()->json(['message'=>'bus_id Not Found'], 404);
        
                 }
            }
        
               else
                {
                    return response()->json(['message'=>'route_id Not Found'], 404);
                }

        }


    //Update Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'bus_id'=>'required',
            'route_id'=>'required',
            'status'=>['required','max:191'],
        ]);

        //Get busTable Foreign Key
        $b_id = $request->bus_id;
        $busTable = busTable::find($b_id);

        //Get routesTable Foreign Key
        $r_id = $request->route_id;
        $routes = routes::find($r_id);

        $status = $request->status;

  
        $bus_routes = bus_routes::find($id);
        if($bus_routes)
        {
         if($routes)
         {
             if($busTable)
             {
                if($status=='active' || $status=='blocked')
                {
                  $bus_routes->bus_id = $request->bus_id;
                  $bus_routes->route_id = $request->route_id;
                  $bus_routes->status = $request->status;	
           
                  $bus_routes->update();
                  return response()->json(['message'=>'Updated Successfully'], 200);
                }
                else{

                    return response()->json(['message'=>'invalied the status, Please enter the active or blocked'], 404);
            
                     }  

             }

             else{

                return response()->json(['message'=>'bus_id Not Found'], 404);
        
                 }
            }
        
               else
                {
                    return response()->json(['message'=>'route_id Not Found'], 404);
                }
            
        }
        else
        {
            return response()->json(['message'=>'Not Update Bus Routes Details'], 404);
        }
        
    }

    //Delete Function
    public function destroy($id)
    {
        $bus_routes = bus_routes::find($id);
        if($bus_routes)
        {
            $bus_routes->delete();
            return response()->json(['message'=>'Deleted Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Delete Bus Routes Details'], 404);
        }
    }
}
