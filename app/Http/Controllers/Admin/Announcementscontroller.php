<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Announcements;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class Announcementscontroller extends Controller
{
    public function index()
    {
        $result['accountt']=Announcements::all();
        return view('admin/announcements',$result);
    }
    public function show(Request $request,$id='')
    {
        if($id>0){
            $arr=Announcements::where(['id'=>$id])->get(); 

            $result['images']=$arr['0']->images;
            $result['name']=$arr['0']->name;
            $result['startdate']=$arr['0']->name;
            $result['about']=$arr['0']->about;
            $result['topic']=$arr['0']->topic;
            $result['id']=$arr['0']->id;
        }else{
            $result['images']='';
            $result['name']='';
            $result['startdate']='';
            $result['about']='';
            $result['topic']='';
            $result['id']='';
        }
        return view('admin/manage_announcements' , $result);
    }
    public function mange_process(Request $request)
    {
                $request->validate([
                'images' => 'required',
                'name' => 'required',
                'startdate' => 'required',
                'about' => 'required',
                'topic' => 'required',
                
            ]);
            if($request->post('id') > 0){
           $movie = Announcements::find($request->post('id'));
           $msg = "Announcements Updated!";
       }else{
           $movie = new Announcements;
           $msg = "New Announcements Uplaoded!";
       }
        if($request->hasfile('images')){

            if($request->post('id')>0){
                $arrImage=DB::table('announcements')->where('id',$request->post('id'))->get();
                $old_profile = 'assets/accountes/' .$arrImage[0]->images;
                if(file_exists($old_profile)) {  
            
                    File::delete($old_profile);
                }
            }

            $file=$request->file('images');
            $name = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
            $upload_path = 'assets/accountes';
            $file->move($upload_path, $name);
            $movie->images=$name == null ? $request->post('images') : $name;
        }

    
       $movie->name = $request->post('name');
       $movie->startdate = $request->post('startdate');
       $movie->about = $request->post('about');
       $movie->topic = $request->post('topic');
       $movie->save();

       $request->session()->flash('message',$msg);
       return redirect('admin/announcements');

        
    }
    public function announcementsdelete(Request $request,$id)
    {
            $model= Announcements::find($id);
            $model->delete();
            $request->session()->flash('message','Announcements Deleted');
            return redirect('admin/announcements');
    }
}
