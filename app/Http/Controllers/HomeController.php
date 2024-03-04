<?php

namespace App\Http\Controllers;

use App\Mail\UserRegister;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\resturant;
use App\Models\product;
use App\Models\ProductBasket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function home()
   {
     
      // $resturant= resturant::paginate(4);
      // $resturant= resturant::where('title', 'like','%t%')->get();
      $resturant= resturant::orderByDesc('created_at')->limit(4)->get();
      $bestResturant = resturant::orderByDesc('counter') -> limit(3)->get();
      $category = category::all();
      $userCount =User::all()->count();
     $sliderResturant = resturant::where('is_list' , '=' , 1) ->orderByDesc('updated_at') -> limit(3)->get();

      return view('front.index' , [
         'resturants' => $resturant , 
        'bestResturant' => $bestResturant,
         'categories' => $category,
         'userCount' => $userCount,
      'sliderResturant' => $sliderResturant,
         
      ]);
   }
// **************************************************************
public  function resturant($id , Request $request)
{
  
  $resturant_one= resturant::find($id);
  $categories=category::all();
  $basket=null;
  if (Auth::user()) {
   $basket = ProductBasket::where('user_id' ,'=', Auth::user()->id)
   ->where('is_payng' ,'=' , 0)
   ->where('resturant_id' ,'=' , $id)
   ->get();
  }
 
 if ($request ->category) {
   $products = product::where('resturant_id', '=', $resturant_one->id)->where('category_id' ,'=', $request ->category)->get();
 } else {
   $products = product::where('resturant_id', '=', $resturant_one->id)->get();
 }
 
resturant::find($id)
->update([
   'counter' => $resturant_one->counter +1
]);

 return view('front.resturant',
 ['resturant' => $resturant_one ,
  'products'=>$products ,
  'categories' => $categories,
  'baskets'=> $basket
]);
}

//*********************************************************** */
      public function search(Request $request)
      {
        // $q= $request ->get('q');
        
         $resturants =resturant::where('title' , 'like', '%'. $request.'%')->get();
         
         return view('front.search' , ['resturants' => $resturants]);
      }

      public function category($id)
      {
         $category = category::find($id);
        return view('front.category' , ['category' => $category]);
      }

      public function getDownload(){
         return response()->download(public_path('image/01.jpg'));
 }
  }
