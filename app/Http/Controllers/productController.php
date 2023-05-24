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



class productController extends Controller
{
     
    public function show()
    {
        return view('admin.product.addproduct');
    } 
    
    public function saveproduct(Request $request){
    //dd($request->input());
    $product = new product;
    $product->seller_id = $request->seller_id;
    $product->name = $request->name;
    $product->quantity = $request->quantity;
    $product->weight = $request->weight;
    $product->rate = $request->rate;
    $product->date = $request->date;
    if($request->hasfile('image'))
         {

            foreach($request->file('image') as $image1)
            {
                $name=$image1->getClientOriginalName();
                $image1->move(public_path().'/images/selles/product', $name);  
                $data[] = $name;  
            }
         }
    $product->image = json_encode($data);
    $res = $product->save();
    if($res){
        return back()->with('success','Product added successfully');
        
    }
    else{
        return back()->with('fail','error');
    }
    //return view('listpurchase');
     }


public function listproduct($id)
{
    $data = DB::table('products')
        ->where('seller_id', $id)
        ->paginate(7);

  return view('admin.product.listproduct', ['viewdata' => $data]);
}



  public function listsells()
{
    $data = DB::table('sellers')->paginate(7);
    return view('admin.product.list', ['viewdata' => $data]);
}
    
    
    
}
