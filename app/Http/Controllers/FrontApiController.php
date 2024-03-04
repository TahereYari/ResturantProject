<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\ProductBasket;
use App\Models\resturant;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontApiController extends Controller
{
    public function search($q)
    {
       return resturant::where('title' ,'like' ,'%'.$q.'%')->paginate(10);
    }
    
    //********************************************************************* */


    public function index()
    {
        $resturant= resturant::orderByDesc('created_at')->limit(4)->get();
        $bestResturant = resturant::orderByDesc('counter') -> limit(3)->get();
        $category = category::all();
        $userCount =User::all()->count();
        $sliderResturant = resturant::where('is_list' , '=' , 1) ->orderByDesc('updated_at') -> limit(3)->get();

        $response=
        [
            'resturants' => $resturant , 
         'bestResturant' => $bestResturant,
         'categories' => $category,
         'userCount' => $userCount,
         'sliderResturant' => $sliderResturant,
        ];

        return response($response,200);
    }
    
    //********************************************************************* */



    public function resturant($id, Request $request)
    {
          $resturant_one= resturant::find($id);
          $categories=category::all();
        
        
        $user_id='32';
          // if (Auth::user()) {
          //  $basket = ProductBasket::where('user_id' ,'=', Auth::user()->id)
          //  ->where('is_payng' ,'=' , 0)
          //  ->where('resturant_id' ,'=' , $id)
          //  ->get();
          // }
          // else{
          //   $basket=null;
          // }

          $basket = ProductBasket::where('user_id' ,'=', $user_id)
          ->where('is_payng' ,'=' , 0)
          ->where('resturant_id' ,'=' , $id)
          ->get();
        
      
        if ($request ->category) {
          $products = product::where('resturant_id', '=', $resturant_one->id)->where('category_id' ,'=', $request ->category)->get();
        } else {
          $products = product::where('resturant_id', '=', $resturant_one->id)->get();
        }
  
        
        resturant::find($id)
        ->update([
          'counter' => $resturant_one->counter +1
        ]);
    
      
        $response =
        ['resturant' => $resturant_one ,
          'products'=>$products ,
          'categories' => $categories,
          'basket'=> $basket,
          
          
        ];
        

        return response($response , 200);
    }
    
  //********************************************************************* */


    public function category($id)
    {
      // $category = category::find($id);
       $products =product::where('category_id','=', $id)->get();
      return response($products);
    }
    
    //********************************************************************* */

    public function wallet($price) 
    {
          $user_id = Auth::user()->id;
          
          $wallet = wallet::where('user_id' , '=',$user_id)->first();
        
          if($wallet){
            $wallet->update(['price' =>   $wallet->price += $price]);
          }
          else
          {
            $wallet= wallet::create([
              'user->id'=>$user_id,
              'price' =>$price,
            ]);
          
          }

          return response($wallet,200);

        }
      
    }

    
    //********************************************************************* */


 
  

