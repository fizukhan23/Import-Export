<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\sendEmail;
// use App\Mail\SendPDFMail;
// use Barryvdh\DomPDF\Facade\Pdf;
use PDF;
use Carbon;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer;
use Log;
use Exception;
use DB;



class apiController extends Controller
{
    
 //register api   
   public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|digits:10',
            'email' => 'required',
            'password' => 'required',
           
       ]);

        if ($validator->fails()) {
            $output['response']=false;
            $output['message']=$validator->errors();
        }else{
            $input = $request->all();
            $encrypt= $input['password'];
            $pass=Hash::make($encrypt);
             $email= $input['email'];
             $var = DB::table('sellers')
           ->where('email',$input['email'])
           ->where('mobile',$input['mobile'])
           ->first();  
            if($var){
                  
                    $output['response']=false;
                    $output['message']="user already Avaliable. Please Login";
                  
             }else{
               $var = DB::table('sellers')
                ->insertGetId([
                    'name' => $input['name'],
                    'mobile' => $input['mobile'],
                    'email' => $input['email'],
                    'password' => $pass,
                   
                ]);
                 
                   $user_details = DB::table('sellers')
                        ->where('id', '=', $var)
                        ->first();
                         if($user_details){
                                $output['response']=true;
                                $output['message']='Register Successfull';
                                $output['data']=$user_details;
                            }else{
                                $output['response']=false;
                                $output['message']='Invalid user';
                            }
             }
         }
        header('Content-Type: application/json'); 
        print_r(json_encode($output));  
    }
    
    
    
    
    
     //login api   
 public function login(request $request){
      $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password'=>'required',
         
           
              ]);
        if ($validator->fails()) {
            $output['response']=false;
            $output['message']=$validator->errors();
        }else{
           
              $affected = DB::table('sellers')->where('email',$request->email)->first();
              
            if($affected){
              $dbpassword = $affected->password;
                  if(Hash::check($request->password,$dbpassword)){
                    $output['response']=true;
                    $output['message']='login Successfull';
                    $output['data']=$affected;
                       
                  }else{
                     $output['response']=false;
                    $output['message']='Invalid password';
                   
                  }
              }
              else{
                    $output['response']=false;
                    $output['message']='User Not Found';
                  
                }    
        }
        header('Content-Type: application/json'); 
        print_r(json_encode($output));
  }


            
 
 
 //get profile
public function getprofile(Request $request){
      $validator = Validator::make($request->all(), [
            'id' => 'required',
       ]);

        if ($validator->fails()) {
            $output['response']=false;
            $output['message']=$validator->errors();
        }
        else
        {
            $input = $request->all();  
            $r=$request->id;
            $dbresponse= DB::table('sellers')->where('id', $r)->latest('id')->get();
                //   print_r($dbresponse);
                foreach( $dbresponse as $i){
                      if($i->icon)
                      {
                         $i->icon = env('APP_URL') . '/images/Profile/' . $i->icon;
                      }
                }
                  if($dbresponse)
                     {        
                         $output['response']=true;
                         $output['data']=$dbresponse;
                     }
                     else
                     {
                         $output['response']=false;
                         $output['message']='user not found';
                     } 
        }
        header('Content-Type: application/json'); 
        print_r(json_encode($output));  
}
    
  
 public function update_profile(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            ]);

        if ($validator->fails()) {
            $output['response']=false;
            $output['message']=$validator->errors();
        }else{
            $input = $request->all();
            $encrypt = $input['password'];
            $pass = Hash::make($encrypt);
             
           $user = DB::table('sellers')
           ->where('id', '=', $input['user_id'])
           ->first();
            if($user != null){
         
             if(!empty($request->hasfile('icon'))){
                       $destinationPath = ('images/Profile/' );
                       $images = $input['icon'];
                       $extension = $images->getClientOriginalExtension(); 
                       $fileNames = time().'.'.$extension; 
                       $images->move($destinationPath, $fileNames);
                     
                       $affected = DB::table('sellers')
                          ->where('id', '=', $input['user_id'])
                          ->update(['icon' => $fileNames,
                         'name' => $input['name'],
                                    'email' => $input['email'],
                                          'password' => $pass,
                                    'mobile' => $input['mobile'],
                                  
                        ]); 
                       
                    }
                   
                $userss = DB::table('sellers')
                   ->where('id', '=', $input['user_id'])
                   ->first(); 
                   
                  if ($userss) {
                $userss->icon = isset($userss->icon) ? env('APP_URL') . '/images/Profile/' . $userss->icon : null;
                               }
                   $output['response'] = true;
                   $output['data'] = $userss;
                    
            }else{
                $output['response']=false;
                $output['message']='Invalid User';
            }
            
        }
        header('Content-Type: application/json');
        print_r(json_encode($output));  
    }
    
 
  



  
  
  
  
  
    
//feedback api
public function Feedback(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:sellers,id',
        'message' => 'required|string',
    ]);

    // insert the feedback data into the database
    DB::table('Feedback')->insert([
        'user_id' => $request->input('user_id'),
        'message' => $request->input('message'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // return a response indicating success
    return response()->json([
        'message' => 'Feedback saved successfully.',
    ], 201);
}


//Quotation api
public function Quotation(Request $request){
    $validator = Validator::make($request->all(), [
        'seller_id' => 'required|exists:sellers,id',
        'container' => 'required',
        'origin' => 'required',
        'weight' => 'required',
        'rate' => 'required',
        'term' => 'required',
        'port' => 'required',
        'lines' => 'required',
        'grade' => 'required',
        'days' => 'required',
        'validity' => 'required',
        'description' => 'required',
        'date' => 'required',
        'image' => 'required',
    ]);

    if ($validator->fails()) {
        $output['response'] = false;
        $output['message'] = $validator->errors()->first();
    } else {
        $input = $request->all();
        $data = array();

        if ($request->hasFile('image')) {
            $files = $request->file('image');

            foreach($files as $file){
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path("images/product/");
                $file->move($destinationPath, $fileName);
                $data[] = $fileName;
            }

            $image = implode(",", $data);
        } else {
            $image = null;
        }

        $affected = DB::table('Quotation')->insertGetId([ 
            'seller_id' => $input['seller_id'],
            'container' => $input['container'],
            'origin' => $input['origin'],
            'weight' => $input['weight'],
            'rate' => $input['rate'],
            'term' => $input['term'],
            'port' => $input['port'],
            'lines' => $input['lines'],
            'grade' => $input['grade'],
            'days' => $input['days'],
            'validity' => $input['validity'],
            'description' => $input['description'],
            'date' => $input['date'],
            'image' => $image,
        ]);
        
        $user_details = DB::table('Quotation')
            ->where('id', '=', $affected)
            ->first(); 
            
        if ($affected) {
            $output['response'] = true;
            $output['message'] = 'Quotation successfully added';
            $output['data'] = $user_details;
        } else {
            $output['response'] = false;
            $output['message'] = 'Failed to add quotation';
        }
    }

    return response()->json($output);
}

         

public function get_product(Request $request){
    $validator = Validator::make($request->all(), [
    'seller_id' => 'required|exists:sellers,id',
        ]);

    if ($validator->fails()) {
        $output['response'] = false;
        $output['message'] = $validator->errors();
    } else {
        $input = $request->all();
        $seller_id = $input['seller_id'];
        $dbresponse = DB::table('Quotation')
            ->where('seller_id', $seller_id)
            ->latest('id')
            ->get();

        foreach ($dbresponse as $item) {
            if ($item->image) {
                $images = explode(',', $item->image);
                $processed_images = array_map(function ($image) {
                    return env('APP_URL') . '/images/product/' . trim($image);
                }, $images);
                $item->image = $processed_images;
            }
        }

        if ($dbresponse->count() > 0) {
            $output['response'] = true;
            $output['data'] = $dbresponse;
        } else {
            $output['response'] = false;
            $output['message'] = 'No products found';
        }
    }

    return response()->json($output);
}
    


  //product api   
  public function Product(Request $request){
    $validator = Validator::make($request->all(), [
        'seller_id' => 'required|exists:sellers,id',
        'name' => 'required',
        'quantity' => 'required',
        'weight' => 'required',
        'rate' => 'required',
        'date' => 'required',
        'image' => 'required',
    ]);

    if ($validator->fails()) {
        $output['response'] = false;
        $output['message'] = $validator->errors()->first();
    } else {
        $input = $request->all();
        $data = array();

        if ($request->hasFile('image')) {
            $files = $request->file('image');

            foreach($files as $file){
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path("images/selles/product/");
                $file->move($destinationPath, $fileName);
                $data[] = $fileName;
            }

            $image = implode(",", $data);
        } else {
            $image = null;
        }

        $affected = DB::table('products')->insertGetId([ 
            'seller_id' => $input['seller_id'],
            'name' => $input['name'],
            'quantity' => $input['quantity'],
            'weight' => $input['weight'],
            'rate' => $input['rate'],
            'date' => $input['date'],
            'image' => $image,
        ]);
        
        $user_details = DB::table('products')
            ->where('id', '=', $affected)
            ->first(); 
            
        if ($affected) {
            $output['response'] = true;
            $output['message'] = 'product successfully added';
            $output['data'] = $user_details;
        } else {
            $output['response'] = false;
            $output['message'] = 'Failed to add quotation';
        }
    }

    return response()->json($output);
}  
    
public function get_Products(Request $request){
    $validator = Validator::make($request->all(), [
    'seller_id' => 'required|exists:sellers,id',
        ]);

    if ($validator->fails()) {
        $output['response'] = false;
        $output['message'] = $validator->errors();
    } else {
        $input = $request->all();
        $seller_id = $input['seller_id'];
        $dbresponse = DB::table('products')
            ->where('seller_id', $seller_id)
            ->latest('id')
            ->get();

        foreach ($dbresponse as $item) {
            if ($item->image) {
                $images = explode(',', $item->image);
                $processed_images = array_map(function ($image) {
                    return env('APP_URL') . '/images/selles/product/' . trim($image);
                }, $images);
                $item->image = $processed_images;
            }
        }

        if ($dbresponse->count() > 0) {
            $output['response'] = true;
            $output['data'] = $dbresponse;
        } else {
            $output['response'] = false;
            $output['message'] = 'No products found';
        }
    }

    return response()->json($output);
}    
    
  
public function updateProduct(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'seller_id' => 'exists:sellers,id',
    ]);

    if ($validator->fails()) {
        $output['response'] = false;
        $output['message'] = $validator->errors()->first();
    } else {
        $input = $request->all();
        $data = array();

        if ($request->hasFile('image')) {
            $files = $request->file('image');

            foreach($files as $file){
                $fileName = uniqid() . '_' . $file->getClientOriginalName(); // generate unique file name
                $destinationPath = public_path("images/selles/product/");
                $file->move($destinationPath, $fileName);
                $data[] = $fileName;
            }

            $image = implode(",", $data);
        } else {
            $image = null;
        }

        $product = DB::table('products')->where('id', $id)->first();
        if (!$product) {
            $output['response'] = false;
            $output['message'] = 'Product not found';
        } else {
            $updateData = array();
            foreach ($input as $key => $value) {
                if ($value !== null) {
                    $updateData[$key] = $value;
                }
            }
            $updateData['image'] = $image ?: $product->image;

            $affected = DB::table('products')->where('id', $id)->update($updateData);
            $user_details = DB::table('products')->where('id', '=', $id)->first(); 

            if ($affected) {
                $output['response'] = true;
                $output['message'] = 'Product successfully updated';
                $output['data'] = $user_details;
            } else {
                $output['response'] = false;
                $output['message'] = 'Failed to update product';
            }
        }
    }

    return response()->json($output);
}


  
 
 public function deleteProduct(Request $request, $id)
{
    $product = DB::table('products')->where('id', $id)->first();
    if (!$product) {
        $output['response'] = false;
        $output['message'] = 'Product not found';
    } else {
        $affected = DB::table('products')->where('id', $id)->delete();
        if ($affected) {
            $output['response'] = true;
            $output['message'] = 'Product successfully deleted';
            // $output['data'] = $product;
        } else {
            $output['response'] = false;
            $output['message'] = 'Failed to delete product';
        }
    }

    return response()->json($output);
}
 
  
    
    
}