<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class Schedulecontroller extends Controller
{
    public function index()
{
    $result['scheduledata'] = Schedule::all();
    return view('admin/schedule', $result);
}



     
    public function show(Request $request,$id='')
    {
        if($id>0){
            $arr=Schedule::where(['id'=>$id])->get(); 

            $result['name']=$arr['0']->name;
            $result['thumbnail'] = $arr['0']->thumbnail;
            $result['enddate']=$arr['0']->enddate;
            $result['location']=$arr['0']->location;
            $result['about']=$arr['0']->about;
            $result['topic']=$arr['0']->topic;
            $result['id']=$arr['0']->id;
        }else{
            $result['name']='';
            $result['thumbnail']='';
            $result['enddate']='';
            $result['location']='';
            $result['about']='';
            $result['topic']='';
            $result['id']='';
        }
        return view('admin/manage_schedule',$result);
    }
    
    public function manage_process(Request $request)
    {
         $request->validate([
                'name' => 'required',
                'thumbnail' => 'required',
                'enddate' => 'required',
                'location' => 'required',
                'about' => 'required',
                'topic' => 'required',
                
            ]);

             if($request->post('id') > 0)
             {
                    $movie = Schedule::find($request->post('id'));
                    $msg = "Schedule Updated!";
            }
            else
            {
                    $movie = new Schedule;
                    $msg = "New Schedule Uplaoded!";
            }

             if($request->hasfile('thumbnail')){

            if($request->post('id')>0){
                $arrImage=DB::table('schedule')->where('id',$request->post('id'))->get();
                $old_profile = 'assets/schedule/' .$arrImage[0]->thumbnail;
                
                if (file_exists($old_profile)) {
                File::delete($old_profile);
                }
            }

            $file=$request->file('thumbnail');
            $name = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
            $upload_path = 'assets/schedule';
            $file->move($upload_path, $name);
            $movie->thumbnail=$name == null ? $request->post('thumbnail') : $name;
        }

       $movie->name = $request->post('name');
       $movie->enddate = $request->post('enddate');
       $movie->location = $request->post('location');
       $movie->about = $request->post('about');
       $movie->topic = $request->post('topic');
       $movie->save();

       $request->session()->flash('message',$msg);
       return redirect('admin/schedule');
    }

    public function scheduledelete(Request $request,$id)
    {
            $model= Schedule::find($id);
            $model->delete();
            $request->session()->flash('message','Schedule Deleted');
            return redirect('admin/schedule');
    }
    
}
