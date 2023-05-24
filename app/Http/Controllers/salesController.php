<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;

use DB;
use App\Models\staff;

class salesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function login(Request $request){
            return view('Sales.login');
     }
    public function saleslogin(Request $request)
{
    $data = $request->input();
    $email = $data['email'];
    $password = $data['password'];
    $uniqueid = $data['uniqueid'];
    $login = DB::table('staff')->where('email', $email)->first();
      
    if ($login) {
     
        if ($login->status == 0 && $login->email == $email && $login->uniqueid == $uniqueid && $login->password == $password) {
            $set_array = array('id' => $login->id, 'email' => $login->email);
            $request->session()->put('sales_session', $set_array);
            session(['uniqueid' => $uniqueid]); 
            return view('Sales.dashboard');
            
        } else {
            return back()->with('fail', 'Invalid email or password');
        }
    } else {
        return back()->with('fail', 'Invalid email or password');
    }


}



}