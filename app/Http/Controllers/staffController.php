<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\staff;



class staffController extends Controller
{
      public function show()
    {
        return view('admin.staff.addstaff');
    }




public function savestaff(Request $request){
    $avaliable = DB::table('staff')->where('email',$request->email)->first();
    if($avaliable){
         return back()->with('fail','Email already exist');
    }else{
    $lastuser = DB::table('staff')->latest('id', 'desc')->first();
                 if($lastuser) {
                     $sId=$lastuser->id+1;
                        if($sId<10){
                            $ref = 'STAFF000'.$sId;
                        }  
                        else{
                              $ref = 'STAFF00'.$sId;
                        }
                         
                 }
                 else{
                     $ref = 'STAFF0001'; 
                 }
     $staff = new staff;
    $staff->name = $request->name;
    $staff->email = $request->email;
     $staff->uniqueid = $ref;
    $staff->password = $request->password;
    $staff->number = $request->number;
    $res = $staff->save();
  
    if($res){
        return back()->with('success','Staff added successfully');
    }  
    
    else{
        return back()->with('fail','error');
    }
    }
     }




    public function liststaff()
{
    $data =DB::table('staff')->paginate(7);
    return view('admin.staff.liststaff', ['viewdata' => $data]);
}

public function update_staffstatus($id){

    $datas = DB::table('staff')->where('id','=', $id)->first();

    if($datas->status=='1'){

        $status='0';

    }else{

        $status='1';

    }

    $affected = DB::table('staff')->where('id', $id)->update(['status' => $status]);

    $data = DB::table('staff')->paginate(10); // Use pagination with 10 items per page

    return view('admin.staff.liststaff', ['viewdata' => $data]);

}




public function editstaff($id){
         $data= staff::findOrFail($id);
        return view('admin.staff.editstaff',compact('data'));
     }

     public function updatestaff(Request $request,$id){
         $data= staff::findOrFail($id);
         $data->name = $request->name;
         $data->email = $request->email;
         $data->password = $request->password;
         $data->number = $request->number;
         $data->update();
        $data = DB::table('staff')->paginate(10);
        return view('admin.staff.liststaff', ['viewdata' => $data]);
        
        
     }
      public function deletestaff(Request $request , $id){
         $data= staff::findOrFail($id);
         $data->delete();
         return back()->with('success','staff deleted successfully');
     }






      
}
