<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Feedback;
use App\Models\sellers;
use App\Models\Quotation;



class FeedbackController extends Controller
{
    
    
    public function listfeedback()
{
    $data = DB::table('sellers')->paginate(7);
    return view('admin.Feedback.listfeedback', ['viewdata' => $data]);
}

   
  public function listfeed($id)
{
    $data = DB::table('Feedback')
        ->where('user_id', $id)
        ->paginate(7);

    return view('admin.Feedback.listfeed', ['viewdata' => $data]);
}



  public function liststafffeedback()
{
    $data = DB::table('sellers')->paginate(7);
    return view('Sales.Feedback.listfeedback', ['viewdata' => $data]);
}

   
  public function liststafffeed($id)
{
    $data = DB::table('Feedback')
        ->where('user_id', $id)
        ->paginate(7);

    return view('Sales.Feedback.listfeed', ['viewdata' => $data]);
}



    
   public function listQuatation()
{
    $data = DB::table('sellers')->paginate(7);
    return view('admin.Quatation.listQuatation', ['viewdata' => $data]);
}
  
   public function list($seller_id)
{
    $data = DB::table('Quotation')
        ->where('seller_id', $seller_id)
        ->paginate(7);

    return view('admin.Quatation.list', ['viewdata' => $data]);
}   
  
  
   public function show()
    {
        return view('admin.Quatation.addproduct');
    }




public function saveQuotation(Request $request){
    $data = array(
        'container' => $request->container,
        'origin' => $request->origin,
        'weight' => $request->weight,
        'rate' => $request->rate,
        'term' => $request->term,
        'port' => $request->port,
        'lines' => $request->lines,
        'grade' => $request->grade,
        'days' => $request->days,
        'validity' => $request->validity,
        'description' => $request->description,
        'date' => $request->date,
        'seller_id' => $request->seller_id
    );

    if($request->hasfile('image')) {
        $images = array();
        foreach($request->file('image') as $image) {
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/images/product', $name);  
            $images[] = $name;  
        }
        $data['image'] = json_encode($images);
    }
  
    $res = DB::table('Quotation')->insert($data);
    if($res){
        return back()->with('success','Product added successfully');
    }
    else{
        return back()->with('fail','error');
    }
}



public function editproduct($id){
    $data = Quotation::findOrFail($id);
    return view('admin.Quatation.editproduct',compact('data'));
}

     public function updateproduct(Request $request,$id){
         $data= Quotation::findOrFail($id);
          $data->container = $request->container;
            $data->origin = $request->origin;
            $data->weight = $request->weight;
            $data->rate = $request->rate;
            $data->term = $request->term;
            $data->port = $request->port;
            $data->lines = $request->lines;
            $data->grade = $request->grade;
            $data->days = $request->days;
            $data->validity = $request->validity;
            $data->description = $request->description;
            $data->date = $request->date;
            $data->supplierid = $request->supplierid;
            if($request->hasfile('image'))
         {

            foreach($request->file('image') as $image1)
            {
                $name=$image1->getClientOriginalName();
                $image1->move(public_path().'/images/product', $name);  
                $data[] = $name;  
            }
         }
    $data->image = json_encode($data);
                 $data->update();
        $data = product::paginate(10);
        return view('admin.Quatation.listproduct',['viewdata' => $data]);
        
        
     }
      public function deleteproduct(Request $request , $id){
         $data= Quotation::findOrFail($id);
         $data->delete();
         return back()->with('success','product deleted successfully');
     }

      

    
    
}