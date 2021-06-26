<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\bus_schedules;
use App\Models\bus_seates;
use App\Models\bus_schedule_bookings;
use Illuminate\Http\Request;

class bus_schedule_bookingsController extends Controller
{
    //Get Function
    public function index()
    {
        $bus_schedule_bookings = bus_schedule_bookings::all();
        return response()->json(['bus_schedule_bookings'=> $bus_schedule_bookings], 200);
    }

    //Show Function
    public function show($id)
    {
        $bus_schedule_bookings = bus_schedule_bookings::find($id);

        if($bus_schedule_bookings)
        {
            return response()->json(['bus_schedule_bookings'=> $bus_schedule_bookings], 200);
        }
        else
        {
            return response()->json(['message'=> 'No Bus Schedule Bookings Details'], 404);
        }
        
    }

    //Insert Function
    public function store(Request $request)
    {
        $request->validate([
            'bus_seate_id'=>'required',
            'user_id'=>'required',
            'bus_schedule_id'=>'required',
            'seat_number'=>'required|numeric|max:50',
            'price'=>'required|numeric|max:190',
            'status'=>['required','max:191'],
        ]);

        //Get bus_seatesTable Foreign Key
        $bseate_id = $request->bus_seate_id;
        $bus_seates = bus_seates::find($bseate_id);

        //Get bus_userTable Foreign Key
        $U_id = $request->user_id;
        $user = user::find($U_id);

        //Get bus_schedulesTable Foreign Key
        $bsch_id = $request->bus_schedule_id;
        $bus_schedules = bus_schedules::find($bsch_id);

        $status = $request->status;
  
        $bus_schedule_bookings = new bus_schedule_bookings;
        if($bus_seates)
        {
         if($user)
         {
             if($bus_schedules)
             {
                if($status=='cancel' || $status=='active') 
                {
                  $bus_schedule_bookings->bus_seate_id = $request->bus_seate_id;
                  $bus_schedule_bookings->user_id = $request->user_id;
                  $bus_schedule_bookings->bus_schedule_id = $request->bus_schedule_id;
                  $bus_schedule_bookings->seat_number = $request->seat_number;
                  $bus_schedule_bookings->price = $request->price;
                  $bus_schedule_bookings->status = $request->status;

                  $bus_schedule_bookings->save();
                  return response()->json(['message'=>'Added New Bus Schedule Bookings Successfully'], 200);
                }
                else{

                    return response()->json(['message'=>'invalied the status, Please enter the cancel or active'], 404);
            
                    }  
            }

            else{

               return response()->json(['message'=>'bus_schedule_id Not Found'], 404);
       
                }
           }
       
              else
               {
                   return response()->json(['message'=>'user_id Not Found'], 404);
               }
           
       }
       else
       {
           return response()->json(['message'=>'bus_seate_id Not Found'], 404);
       }

            
    }

    //Update Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'bus_seate_id'=>'required',
            'user_id'=>'required|max:191',
            'bus_schedule_id'=>'required',
            'seat_number'=>'required|numeric|max:50',
            'price'=>'required|numeric|max:190',
            'status'=>['required','max:191'],
        ]);

        //Get bus_seatesTable Foreign Key
        $bseate_id = $request->bus_seate_id;
        $bus_seates = bus_seates::find($bseate_id);

        //Get bus_userTable Foreign Key
        $U_id = $request->user_id;
        $user = user::find($U_id);

        //Get bus_schedulesTable Foreign Key
        $bsch_id = $request->bus_schedule_id;
        $bus_schedules = bus_schedules::find($bsch_id);

        $status = $request->status;
  
        $bus_schedule_bookings = bus_schedule_bookings::find($id);
        if($bus_schedule_bookings)
        {
            if($bus_seates)
            {
             if($user)
             {
                 if($bus_schedules)
                 {
                    if($status=='cancel' || $status=='active') 
                    {
                      $bus_schedule_bookings->bus_seate_id = $request->bus_seate_id;
                      $bus_schedule_bookings->user_id = $request->user_id;
                      $bus_schedule_bookings->bus_schedule_id = $request->bus_schedule_id;
                      $bus_schedule_bookings->seat_number = $request->seat_number;
                      $bus_schedule_bookings->price = $request->price;
                      $bus_schedule_bookings->status = $request->status;	
           
                     $bus_schedule_bookings->update();
                     return response()->json(['message'=>'Updated Successfully'], 200);

                    }
                    else{
    
                        return response()->json(['message'=>'invalied the status, Please enter the cancel or active'], 404);
                
                        }  
                }

                else{
    
                   return response()->json(['message'=>'bus_schedule_id Not Found'], 404);
           
                    }
               }
           
                  else
                   {
                       return response()->json(['message'=>'user_id Not Found'], 404);
                   }
               
           }
           else
           {
               return response()->json(['message'=>'bus_seate_id Not Found'], 404);
           }
        }
        else
        {
            return response()->json(['message'=>'Not Update Bus_Schedule_Bookings Details'], 404);
        }
        
    }

    //Delete Function
    public function destroy($id)
    {
        $bus_schedule_bookings = bus_schedule_bookings::find($id);
        if($bus_schedule_bookings)
        {
            $bus_schedule_bookings->delete();
            return response()->json(['message'=>'Deleted Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Delete Bus_Schedule_Bookings Details'], 404);
        }
    }
}
