<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcements;

class AnnouncementsController extends Controller
{
    public function index()
    {
        $announcements = Announcements::all();
        if ($announcements->count() > 0) {
            $response = [
                'message' => $announcements->count() .  'Announcements Found',
                'status' => 1,
                'data' => $announcements
            ];
        } else {
            $response = [
                'message' => 'No Announcements Found',
                'status' => 0,
                'data' => []
            ];
        }
        return response()->json($response, 200);
        
       
    }
     public function showById($id)
    {
        $announcements = Announcements::find($id);

        if ($announcements) {
            $response = [
                'message' => 'Announcements Found',
                'status' => 1,
                'data' => $announcements
            ];
        } else {
            $response = [
                'message' => 'No Announcements Found',
                'status' => 0,
                'data' => null 
            ];
        }

        return response()->json($response, 200);
    }
}
