<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function show()
    {
        $users = User::all();
        if ($users->count() > 0) {
            $response = [
                'message' => $users->count() . ' Users Found',
                'status' => 1,
                'data' => $users
            ];
        } else {
            $response = [
                'message' => 'No Users Found',
                'status' => 0,
                'data' => []
            ];
        }
        return response()->json($response, 200);
    }

    public function showById($id)
    {
        $user = User::find($id);

        if ($user) {
            $response = [
                'message' => 'User Found',
                'status' => 1,
                'data' => $user
            ];
        } else {
            $response = [
                'message' => 'User Not Found',
                'status' => 0,
                'data' => null 
            ];
        }

        return response()->json($response, 200);
    }

    public function addData(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|string', 
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'about' => 'required|string',
            'inters' => 'required|string',
            'church' => 'required|string',
        ]);

        $base64Image = $validatedData['image'];
        $decodedImage = base64_decode($base64Image);
        $filename = uniqid() . '.jpg'; 
        Storage::disk('public')->put('assets/photo/' . $filename, $decodedImage);

        $user = new User([
            'image' => $filename,
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'about' => $validatedData['about'],
            'inters' => $validatedData['inters'],
            'church' => $validatedData['church'],
        ]);

        $user->save();

        return response()->json(['message' => 'User registered successfully'], 201);
    }
}
