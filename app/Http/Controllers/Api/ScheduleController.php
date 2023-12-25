<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedule = Schedule::all();
        if ($schedule->count() > 0) {
            $response = [
                'message' => $schedule->count() .  'Schedule Found',
                'status' => 1,
                'data' => $schedule
            ];
        } else {
            $response = [
                'message' => 'No Schedule Found',
                'status' => 0,
                'data' => []
            ];
        }
        return response()->json($response, 200);
        
       
    }
     public function showById($id)
    {
        $schedule = Schedule::find($id);

        if ($schedule) {
            $response = [
                'message' => 'Schedule Found',
                'status' => 1,
                'data' => $schedule
            ];
        } else {
            $response = [
                'message' => 'No Schedule Found',
                'status' => 0,
                'data' => null 
            ];
        }

        return response()->json($response, 200);
    }

}
