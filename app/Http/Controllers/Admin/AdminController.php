<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
   
    public function users()
    {
        $data['users']=User::all();
        return view('admin/users',$data);
    }

     public function show()
    {
         $result['data'] = Admin::all();
        return view('admin/admins' , $result);
    }

    public function create(Request $request)
    {

        $request->validate([
            'email'=>'required',
        ]);

        if($request->post('id')>0){
            $model=Admin::find($request->post('id'));
            $msg="Admin updated";
        }else{
            $model = new Admin();
            $msg="Admin Added.";
            $model->password = hash::make($request->post('password'));
        }

        $model->email = $request->post('email');
        $model->name=$request->post('name');
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/admins');
        
    }

    public function manage_admin(Request $request,$id='')
    {
        if($id>0){
            $arr=Admin::where(['id'=>$id])->get(); 

            $result['email']=$arr['0']->email;
            $result['password']=$arr['0']->password;
            $result['name']=$arr['0']->name;
            $result['id']=$arr['0']->id;
        }else{
            $result['email']='';
            $result['password']='';
            $result['name']='';
            $result['id']='';
        }
        return view('admin/manage_admin',$result);
    }
       
    public function admindelete(Request $request,$id)
    {
            $model=Admin::find($id);
            $model->delete();
            $request->session()->flash('message','Admin deleted');
            return redirect('admin/admins');
    }
}
