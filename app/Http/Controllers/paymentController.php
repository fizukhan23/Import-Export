<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\payment;



class paymentController extends Controller
{
      public function show()
    {
        return view('admin.payment.addpayment');
    }




public function savepayment(Request $request){
    //dd($request->input());
    $payment = new payment;
    $payment->details = $request->details;
    $payment->p_status = $request->p_status;
    
    $res = $payment->save();
    if($res){
        return back()->with('success','Payment added successfully');
        
    }
    else{
        return back()->with('fail','error');
    }
    //return view('listpayment');
     }


 public function listpayment()
{
    $data = payment::paginate(7);
    return view('admin.payment.listpayment', ['viewdata' => $data]);
}

   
public function update_paymentstatus($id){

    $datas = DB::table('payments')->where('id','=', $id)->first();

    if($datas->p_status=='1'){
        $status='0';

    }else{

        $status='1';
  }

    $affected = DB::table('payments')->where('id', $id)->update(['p_status' => $status]);

    $data = DB::table('payments')->paginate(10); // Use pagination with 10 items per page

    return view('admin.payment.listpayment', ['viewdata' => $data]);

}



public function editpayment($id){
         $data= payment::findOrFail($id);
        return view('admin.payment.editpayment',compact('data'));
     }

     public function updatepayment(Request $request,$id){
         $data= payment::findOrFail($id);
          $data->details = $request->details;
            $data->p_status = $request->p_status;
            
                 $data->update();
        $data = payment::paginate(10);
        return view('admin.payment.listpayment',['viewdata' => $data]);
        
        
     }
      public function deletepayment(Request $request , $id){
         $data= payment::findOrFail($id);
         $data->delete();
         return back()->with('success','payment deleted successfully');
     }

      
}
