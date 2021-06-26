<?php

namespace App\Http\Controllers;

use App\Models\busTable;
use Illuminate\Http\Request;

class BusTableController extends Controller
{
    //Get Function
    public function index()
    {
        $busTable = busTable::all();
        return response()->json(['bus_tables'=> $busTable], 200);
    }

    //Show Function
    public function show($id)
    {
        $busTable = busTable::find($id);

        if($busTable)
        {
            return response()->json(['bus_tables'=> $busTable], 200);
        }
        else
        {
            return response()->json(['message'=> 'No Bustables Details'], 404);
        }
        
    }

    //Insert Function
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:50',
            'type'=>'required|max:191',
            'vehical_number'=>'required|max:15',
           
        ]);
  
        $busTable = new busTable;
        $busTable->name = $request->name;
        $busTable->type = $request->type;
        $busTable->vehical_number = $request->vehical_number;
       

        $busTable->save();
        return response()->json(['message'=>'Added New Bus Successfully'], 200);
    }

    //Update Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:50',
            'type'=>'required|max:191',
            'vehical_number'=>'required|max:15',
        ]);
  
        $busTable = busTable::find($id);
        if($busTable)
        {
            $busTable->name = $request->name;
            $busTable->type = $request->type;
            $busTable->vehical_number = $request->vehical_number;
           
            $busTable->update();
            return response()->json(['message'=>'Updated Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Update bus Details'], 404);
        }
        
    }

    //Delete Function
    public function destroy($id)
    {
        $busTable = busTable::find($id);
        if($busTable)
        {
            $busTable->delete();
            return response()->json(['message'=>'Deleted Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Delete bus Details'], 404);
        }
    }
}
