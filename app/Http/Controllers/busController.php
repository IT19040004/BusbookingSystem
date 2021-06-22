<?php

namespace App\Http\Controllers;

use App\Models\bus;
use Illuminate\Http\Request;

class busController extends Controller
{
    //Get Function
    public function index()
    {
        $buses = bus::all();
        return response()->json(['bus_routes'=> $buses], 200);
    }

    //Show Function
    public function show($id)
    {
        $buses = bus::find($id);

        if($buses)
        {
            return response()->json(['buses'=> $buses], 200);
        }
        else
        {
            return response()->json(['message'=> 'No bus Details'], 404);
        }
        
    }

    //Insert Function
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:191',
            'type'=>'required|max:191',
            'vehical_number'=>'required|max:191',
        ]);
  
        $buses = new bus;
        $buses->name = $request->name;
        $buses->type = $request->type;
        $buses->vehical_number = $request->vehical_number;

        $buses->save();
        return response()->json(['message'=>'Added Successfully'], 200);
    }

    //Update Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:191',
            'type'=>'required|max:191',
            'vehical_number'=>'required|max:191',
        ]);
  
        $buses = bus::find($id);
        if($buses)
        {
            $buses->name = $request->name;
            $buses->type = $request->type;
            $buses->vehical_number = $request->vehical_number;	
           
            $buses->update();
            return response()->json(['message'=>'Update Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Update bus Details'], 404);
        }
        
    }

    //Delete Function
    public function destroy($id)
    {
        $buses = bus::find($id);
        if($buses)
        {
            $buses->delete();
            return response()->json(['message'=>'Delete Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Delete bus Details'], 404);
        }
    }
}
