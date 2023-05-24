<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\buyers;



class userController extends Controller
{
      public function show()
    {
        return view('admin.user.addbuyer');
    }




public function savebuyer(Request $request){
    //dd($request->input());
    $buyers = new buyers;
    $buyers->name = $request->name;
    $buyers->email = $request->email;
    $buyers->number = $request->number;
    // $buyers->transection = $request->transection;
    $res = $buyers->save();
    if($res){
        return back()->with('success','Buyer added successfully');
        
    }
    else{
        return back()->with('fail','error');
    }
    //return view('listuser');
     }




    public function listbuyer()
{
    $data = buyers::paginate(7);
    return view('admin.user.listbuyer', ['viewdata' => $data]);
}

public function update_status($id){

    $datas = DB::table('buyers')->where('id','=', $id)->first();

    if($datas->status=='1'){

        $status='0';

    }else{

        $status='1';

    }

    $affected = DB::table('buyers')->where('id', $id)->update(['status' => $status]);

    $data = buyers::paginate(10); // Use pagination with 10 items per page

    return view('admin.user.listbuyer', ['viewdata' => $data]);

}


public function editbuyer($id){
         $data= buyers::findOrFail($id);
        return view('admin.user.editbuyer',compact('data'));
     }

     public function updatebuyer(Request $request,$id){
         $data= buyers::findOrFail($id);
         $data->name = $request->name;
         $data->email = $request->email;
         $data->number = $request->number;
        //  $data->transection = $request->transection;
         $data->update();
        $data = buyers::paginate(10);
        return view('admin.user.listbuyer',['viewdata' => $data]);
        
        
     }
      public function deletebuyer(Request $request , $id){
         $data= buyers::findOrFail($id);
         $data->delete();
         return back()->with('success','buyer deleted successfully');
     }

      
}
