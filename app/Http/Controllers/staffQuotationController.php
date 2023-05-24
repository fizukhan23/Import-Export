<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\product;



class staffQuotationController extends Controller
{
     
    //  public function show(){
    //       $uniqueid = session('uniqueid'); 
    //     return view('Sales.product.addproduct', compact('uniqueid'));
    // }




// public function saveproduct(Request $request){
//     //dd($request->input());
//     $product = new Quotation;
//      $product->staffid = $request->staffid;
//     $product->container = $request->container;
//     $product->origin = $request->origin;
//     $product->weight = $request->weight;
//     $product->rate = $request->rate;
//     $product->term = $request->term;
//     $product->port = $request->port;
//     $product->lines = $request->lines;
//     $product->grade = $request->grade;
//     $product->days = $request->days;
//     $product->validity = $request->validity;
//     $product->description = $request->description;
//     $product->date = $request->date;
//     $product->supplierid = $request->supplierid;
//       if($request->hasfile('image'))
//          {

//             foreach($request->file('image') as $image1)
//             {
//                 $name=$image1->getClientOriginalName();
//                 $image1->move(public_path().'/images/product', $name);  
//                 $data[] = $name;  
//             }
//          }
//     $product->image = json_encode($data);
//     $res = $product->save();
//     if($res){
//         return back()->with('success','Product added successfully');
        
//     }
//     else{
//         return back()->with('fail','error');
//     }
//     //return view('listproduct');
//      }




public function liststaffQuotation($id)
{
    $data = DB::table('Quotation')
        ->where('seller_id', $id)
        ->paginate(7);
 return view('Sales.Quotation.listQuotation', ['viewdata' => $data]);
}
   
   
 public function listsellers()
{
    $data = DB::table('sellers')->paginate(7);
    return view('Sales.Quotation.list', ['viewdata' => $data]);
}
    
   


// public function editproduct($id){
//      $uniqueid = session('uniqueid'); 
//          $data= product::findOrFail($id);
//         return view('Sales.product.editproduct',compact('data','uniqueid'));
//      }

    //  public function updateproduct(Request $request,$id){
    //      $data= product::findOrFail($id);
    //       $data->container = $request->container;
    //         $data->origin = $request->origin;
    //         $data->weight = $request->weight;
    //         $data->rate = $request->rate;
    //         $data->term = $request->term;
    //         $data->port = $request->port;
    //         $data->lines = $request->lines;
    //         $data->grade = $request->grade;
    //         $data->days = $request->days;
    //         $data->validity = $request->validity;
    //         $data->description = $request->description;
    //         $data->date = $request->date;
    //         $data->supplierid = $request->supplierid;
    //         if($request->hasfile('image'))
    //      {

    //         foreach($request->file('image') as $image1)
    //         {
    //             $name=$image1->getClientOriginalName();
    //             $image1->move(public_path().'/images/product', $name);  
    //             $data[] = $name;  
    //         }
    //      }
    // $data->image = json_encode($data);
    //              $data->update();
    //     $data = product::paginate(10);
    //     return view('Sales.product.listproduct',['viewdata' => $data]);
        
        
    //  }
    //   public function deleteproduct(Request $request , $id){
    //      $data= product::findOrFail($id);
    //      $data->delete();
    //      return back()->with('success','product deleted successfully');
    //  }

   
     
       
     
     
      
}
