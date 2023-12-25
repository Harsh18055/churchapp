<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Church;
use App\Models\Announcements;
use App\Models\Schedule;
use App\Models\Mass;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class ViewDashboardController extends Controller
{
     public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/view');
        }else{
            return view('admin.login');
        }
        return view('admin.login');
    }

      public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');

        $result=Admin::where(['email'=>$email])->first();
        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/view');
            }else{
                $request->session()->flash('error','Please Enter Correct password');
                return redirect('admin');
            }
        }else{
            $request->session()->flash('error','Please Enter Valid Login Details');
            return redirect('admin');
        }
    }

   public function show()
    {
            $data = [
                'church' => Church::count(),
                'announcements' => Announcements::count(),
                'schedule' => Schedule::count(),
                'mass' => Mass::count(),
            ];

            return view('admin/viewdashboard', $data);
    }
}
