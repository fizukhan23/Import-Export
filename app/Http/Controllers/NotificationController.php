<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Notification;




class NotificationController extends Controller
{
    
    
    
      
    public function listnotify()
{
    $data = DB::table('Notification')->paginate(7);
    return view('admin.Notification.listnotify', ['viewdata' => $data]);
}
    
    
      public function notifications()
        {
            $users = DB::table('sellers')->get();
            return view('admin.Notification.addnotify',compact('users'));
        }
        
    public function send(Request $req)
    {
        //   dd($req->all());
           
             $data=[];
	        $data['message']= $req->body;
               $tokens = [];
	        //$data['booking_id']="my booking booking_id";
	        if($req->user == "sendmailtoall"){
	            
	            
	            $up = DB::table('sellers')->get(); 
	            foreach($up as $email){
	                array_push($tokens,$email->device_token);
	             
              DB::table('Notification')->
	           insert(['user_id' => $email->id,
	           'message' => $req->body,
	           'created_at'=>date('Y-m-d')]);
	            }
	            }
	            else
	            {
	           
	           $up = DB::table('sellers')->where('device_token' , $req->user)->first(); 
	            $tokens[] = $req->user;
	            DB::table('Notification')->insert(['user_id' => $up->id,'message' => $req->message,'created_at'=>date('Y-m-d')]);
    	     }
         
	        $response = $this->sendFirebasePush($tokens,$data);
	       
	        $users = DB::table('sellers')->get();
             return back()->with('success','Notification send successfully');
	        
    }
    
    
   public function liststaffnotify(){
    $data = DB::table('Notification')->paginate(7);
    return view('Sales.Notification.listnotify', ['viewdata' => $data]);
}
  
    
    
}