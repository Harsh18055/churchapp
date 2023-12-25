<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function show()
    {
       
        return view('register');
       
       
    }
    public function adddata(Request $request)
    {
        $user = new User;

         $base64Image = $request->input('image'); 

         $decodedImage = base64_decode($base64Image);
    
         $filename = uniqid() . '.jpg'; 
    
         Storage::disk('public')->put('assets/photos' . $filename, $decodedImage);
   
    

        $user->image = $filename;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->about = $request->about;
        $user->inters = $request->inters;
        $user->church = $request->church;

        $user->save();


        return redirect()->route('register')->with('success', 'User Register uploaded successfully!');
        
    }
}
