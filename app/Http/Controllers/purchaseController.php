<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\purchase;



class purchaseController extends Controller
{
      public function show()
    {
        return view('admin.purchase.addpurchase');
    }




public function savepurchase(Request $request){
    //dd($request->input());
    $purchase = new purchase;
    $purchase->name = $request->name;
    $purchase->email = $request->email;
    $purchase->number = $request->number;
    $purchase->description = $request->description;
   
    $res = $purchase->save();
    if($res){
        return back()->with('success','Purchase added successfully');
        
    }
    else{
        return back()->with('fail','error');
    }
    //return view('listpurchase');
     }


 public function listpurchase()
{
    $data = purchase::paginate(7);
    return view('admin.purchase.listpurchase', ['viewdata' => $data]);
}

   
public function update_purchstatus($id){

    $datas = DB::table('purchases')->where('id','=', $id)->first();

    if($datas->status=='1'){

        $status='0';

    }else{

        $status='1';

    }

    $affected = DB::table('purchases')->where('id', $id)->update(['status' => $status]);

    $data = DB::table('purchases')->paginate(10); // Use pagination with 10 items per page

    return view('admin.purchase.listpurchase', ['viewdata' => $data]);

}



public function editpurchase($id){
         $data= purchase::findOrFail($id);
        return view('admin.purchase.editpurchase',compact('data'));
     }

     public function updatepurchase(Request $request,$id){
         $data= purchase::findOrFail($id);
         $data->name = $request->name;
         $data->email = $request->email;
         $data->number = $request->number;
         $data->description = $request->description;
         $data->update();
        $data = purchase::paginate(10);
        return view('admin.purchase.listpurchase',['viewdata' => $data]);
        
        
     }
      public function deletepurchase(Request $request , $id){
         $data= purchase::findOrFail($id);
         $data->delete();
         return back()->with('success','purchase deleted successfully');
     }

      
}
