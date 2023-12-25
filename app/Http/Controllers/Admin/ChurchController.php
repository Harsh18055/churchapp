<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Church;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class ChurchController extends Controller
{
   public function index()
{
    $result['data'] = Church::all();
    return view('admin/church', $result);
}


    public function show(Request $request,$id='')
    {
        if($id>0){
            $arr=Church::where(['id'=>$id])->get(); 

            $result['photo']=$arr['0']->photo;
            $result['email']=$arr['0']->email;
            $result['password']=$arr['0']->password;
            $result['name']=$arr['0']->name;
            $result['aboutshort']=$arr['0']->aboutshort;
            $result['aboutlong']=$arr['0']->aboutlong;
            $result['location']=$arr['0']->location;
            $result['starttime']=$arr['0']->starttime;
            $result['id']=$arr['0']->id;
        }else{
            $result['photo']='';
            $result['email']='';
            $result['password']='';
            $result['name']='';
            $result['aboutshort']='';
            $result['aboutlong']='';
            $result['location']='';
            $result['starttime']='';
            $result['id']=0;
            
        }
        return view('admin/manage_church',$result);
    }

   public function process(Request $request)
{
    $request->validate([
        'photo' => 'required',
        'email' => 'required',
        'password' => 'required',
        'name' => 'required',
        'aboutshort' => 'required',
        'aboutlong' => 'required',
        'location' => 'required',
        'starttime' => 'required',
    ]);

     if($request->post('id') > 0){
           $movie = Church::find($request->post('id'));
           $msg = "Church Updated!";
       }else{
           $movie = new Church;
           $msg = "New Church Uplaoded!";
       }
        if($request->hasfile('photo')){

            if($request->post('id')>0){
                $arrImage=DB::table('church')->where('id',$request->post('id'))->get();
                $old_profile = 'assets/chrch/' .$arrImage[0]->photo;
                if(file_exists($old_profile)) {  
            
                    File::delete($old_profile);
                }
            }

            $file=$request->file('photo');
            $name = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
            $upload_path = 'assets/chrch';
            $file->move($upload_path, $name);
            $movie->photo=$name == null ? $request->post('photo') : $name;
        }


    $movie->email = $request->post('email');
       $movie->password = Hash::make($request->post('password'));
       $movie->name = $request->post('name');
       $movie->aboutshort= $request->post('aboutshort');
       $movie->aboutlong = $request->post('aboutlong');
       $movie->location = $request->post('location');
       $movie->starttime = $request->post('starttime');
       $movie->save();

    $request->session()->flash('message', $msg);
    return redirect('admin/church');
}

    public function churchdelete(Request $request,$id)
    {
            $model= Church::find($id);
            $model->delete();
            $request->session()->flash('message','Church Deleted');
            return redirect('admin/church');
    }
}
