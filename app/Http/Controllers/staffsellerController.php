<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\seller;



class staffsellerController extends Controller
{
      public function show()
    {
       $uniqueid = session('uniqueid');
       
        return view('Sales.seller.addseller', compact('uniqueid'));
    }




public function saveseller(Request $request){
   $seller = new seller;
    $seller->staffid = $request->staffid;
    $seller->name = $request->name;
    $seller->email = $request->email;
    $seller->mobile = $request->mobile;
    // $seller->product = $request->product;
    // $seller->transection = $request->transection;
   
    $res = $seller->save();
  
    if($res){
        return back()->with('success','Seller added successfully');
        
    }
    else{
        return back()->with('fail','error');
    }
    //return view('listuser');
     }




    public function listseller()
{
//   $uniqueid = session('uniqueid');
// ->where('staffid', $uniqueid)
// ,'uniqueid' => $uniqueid
    $data = DB::table('sellers')->paginate(7);
    return view('Sales.seller.listseller', ['viewdata' => $data ]);
}

public function update_sellerstatus($id){

    $datas = DB::table('sellers')->where('id','=', $id)->first();

    if($datas->status=='1'){

        $status='0';

    }else{

        $status='1';

    }
      $affected = DB::table('sellers')->where('id', $id)->update(['status' => $status]);
      $data = DB::table('sellers')->paginate(7);
    return view('Sales.seller.listseller', ['viewdata' => $data]);

}




public function editseller($id){
     $uniqueid = session('uniqueid');
         $data= seller::findOrFail($id);
        return view('Sales.seller.editseller',compact('data','uniqueid'));
     }

     public function updateseller(Request $request,$id){
         $data= seller::findOrFail($id);
         $data->name = $request->name;
         $data->email = $request->email;
         $data->mobile = $request->mobile;
        //  $data->product = $request->product;
        //  $data->transection = $request->transection;
          $data->update();
      
    $data = DB::table('sellers')->paginate(7);
    return view('Sales.seller.listseller', ['viewdata' => $data]);
        
        
     }
      public function deleteseller(Request $request , $id){
         $data= seller::findOrFail($id);
         $data->delete();
         return back()->with('success','seller deleted successfully');
     }


public function index(Request $request) {
   
    $buyerCount =DB::table('buyers')->count();
    
    $sellerCount = DB::table('sellers')->count();
     
    $productCount = DB::table('products')->count();
    
    $paymentCount = DB::table('payments')->count();
  
    return view('dashboard', compact('buyerCount', 'sellerCount', 'productCount', 'paymentCount'));
}




      
}
