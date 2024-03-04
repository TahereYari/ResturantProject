<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\resturant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminProductApiController extends Controller
{
   public function index()
   {
    return product::paginate(10);
   }

   //********************************************************** */

   public function show($id)
   {
        return product::findorfail($id);
   }

   //********************************************************** */

   public function create(Request $request)
   {
          // $request->validate([
          //      'name' =>'required|unique:resturants,title',
          
          //      'image' => 'required|mimes:png,jpg'
          //  ]);

     return product::create($request->all());
    
   }

   //********************************************************** */

   public function update(Request $request,$id)
   {
        $product = product::findOrFail($id);

       return $product->update($request->all());
   }

   //********************************************************** */

   public function delete($id)
   {
        return  product::findorfail($id)->delete();
   }

   //********************************************************** */

 
}
