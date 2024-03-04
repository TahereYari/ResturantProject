<?php

namespace App\Http\Controllers;

use App\Models\ProductBasket;
use App\Models\resturant;
use App\Models\product;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    ///************************************************************ */
    public function add($product_id, $resturant_id)
    {
        $product = ProductBasket::where('user_id' , '=', Auth::user()->id)
        ->where('product_id' , '=' ,$product_id)
        ->where('resturant_id', '=' ,$resturant_id)
        ->where('is_payng' , '=' ,0)->first();

        if ( $product) {
            $product->update(['count' =>  $product->count+1]);
        } else {
            $product = ProductBasket::create([
                'product_id'=>$product_id,
                'resturant_id'=>$resturant_id,
                'count'=>1,
                'user_id'=>Auth::user()->id,
                
            ]);
        }
   

        return redirect()->back();
    }

    //********************************************************************* */

    public function addJson($product_id, $resturant_id)
    {
        
        $product = ProductBasket::where('user_id' , '=', Auth::user()->id)
        ->where('product_id' , '=' ,$product_id)
        ->where('resturant_id', '=' ,$resturant_id)
        ->where('is_payng' , '=' ,0)->first();

        if ( $product) {
            $product->update(['count' =>  $product->count+1]);
        } else {
           $product = ProductBasket::create([
                'product_id'=>$product_id,
                'resturant_id'=>$resturant_id,
                'count'=>1,
                'user_id'=>Auth::user()->id
            ]);
        }
        

        dd($product);


        return response($product);
    }

    //********************************************************************* */

    public function minJson($product_id, $resturant_id)
    {
        $product = ProductBasket::where('user_id' , '=', Auth::user()->id)
        ->where('product_id' , '=' ,$product_id)
        ->where('resturant_id', '=' ,$resturant_id)
        ->where('is_payng' , '=' ,0)->first();

        if ( $product && $product->count >1) {
            $product->update(['count' =>  $product->count-1]);
        } 
        // else {
        //    $product = ProductBasket::create([
        //         'product_id'=>$product_id,
        //         'resturant_id'=>$resturant_id,
        //         'count'=>1,
        //         'user_id'=>Auth::user()->id
        //     ]);
        // }
        

        dd($product);


        return response($product);
    }

//******************************************************************** */
    public function checkout($user_id)
    {
        $baskets = ProductBasket::where('user_id' , '=' , $user_id )->where('is_payng' , '=',0)->get();
        $wallet = wallet::where('user_id' , '=',$user_id)->first();

        $total=0;
        foreach ( $baskets  as $basket) {
            $total += $basket->product()->price * $basket->count;
        }

       if (isset($wallet ->price) && $wallet->price >=$total ) {
        $wallet->update(['price' => $wallet->price - $total]);
        foreach ( $baskets  as $basket) {
            $basket->update(['is_payng' =>1]);
        }

       }
       else{
        return "not found";
       }

        return "done";

    }


//********************************************************************* */

    public function checkoutjson($user_id)
    {
        $baskets = ProductBasket::where('user_id' , '=' , $user_id )->where('is_payng' , '=',0)->get();
        $wallet = wallet::where('user_id' , '=',$user_id)->first();

        $total=0;
        foreach ( $baskets  as $basket) {
            $total += $basket->product()->price * $basket->count;
        }

       if (isset($wallet ->price) && $wallet->price >=$total ) {
        $wallet->update(['price' => $wallet->price - $total]);
        foreach ( $baskets  as $basket) {
            $basket->update(['is_payng' =>1]);
        }

       }
       else{
        return "not found";
       }

        return "done";

    }


//********************************************************************* */
    public function delete($id)
    {
        $basket =ProductBasket::where('user_id' , '=' ,Auth::user()->id)
        ->where('id' , '=' , $id)
        ->where('is_payng' ,'=' , 0)->first();

        if ( $basket) {
            $basket->delete();
            return redirect()->back();
        } else {
            return "not found";
        }
        
    }
  
//********************************************************************* */
  

    public function deleteJson($id)
    {
        $basket =ProductBasket::where('user_id' , '=' ,Auth::user()->id)
        ->where('id' , '=' , $id)
        ->where('is_payng' ,'=' , 0)->first();

        if ( $basket) {
            $basket->delete();
           
        } else {
            return "not found";
        }
        
    }
    
    //********************************************************************* */


}
