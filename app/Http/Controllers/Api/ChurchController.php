<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Church;

class ChurchController extends Controller
{
    public function index()
    {
        $church = Church::all();
        if ($church->count() > 0) {
            $response = [
                'message' => $church->count() .  'Church Found',
                'status' => 1,
                'data' => $church
            ];
        } else {
            $response = [
                'message' => 'No Church Found',
                'status' => 0,
                'data' => []
            ];
        }
        return response()->json($response, 200);
        
       
    }
     public function showById($id)
    {
        $church = Church::find($id);

        if ($church) {
            $response = [
                'message' => 'Church Found',
                'status' => 1,
                'data' => $church
            ];
        } else {
            $response = [
                'message' => 'No Church Found',
                'status' => 0,
                'data' => null 
            ];
        }

        return response()->json($response, 200);
    }
}
