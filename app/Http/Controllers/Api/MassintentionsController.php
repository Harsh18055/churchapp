<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mass;


class MassintentionsController extends Controller
{
    public function index()
    {
        $mass = Mass::all();
        if ($mass->count() > 0) {
            $response = [
                'message' => $mass->count() .  'Mass Intentions Found',
                'status' => 1,
                'data' => $mass
            ];
        } else {
            $response = [
                'message' => 'No Mass Intentions Found',
                'status' => 0,
                'data' => []
            ];
        }
        return response()->json($response, 200);
        
       
    }
     public function showById($id)
    {
        $mass = Mass::find($id);

        if ($mass) {
            $response = [
                'message' => 'Mass Intentions Found',
                'status' => 1,
                'data' => $mass
            ];
        } else {
            $response = [
                'message' => 'No Mass Intentions Found',
                'status' => 0,
                'data' => null 
            ];
        }

        return response()->json($response, 200);
    }

}
