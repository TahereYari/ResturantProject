<?php

namespace App\Http\Controllers;

use App\Models\category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdminCategoryApiController extends Controller
{
   public function index()
   {
        return category::paginate(10);
   }
//***************************************** */

   public function show($id)
   {
        return category::findorfail($id);
   }
//***************************************** */


   public function create(Request $request)
   {
         $request->validate([
            'name' => 'required|string|unique:categories,name',
            'description' => 'max:600',
            
        ]);
       
     //    if ($data->errors()->any()) {
     //        return $data ->errors();
     //    }

        return category::create([
          'name' => $request->name,
          'description' => $request->description,
           ]); 
                

   //  return category::created($request->all());
   }

   //***************************************** */

 

   public function update(Request $request , $id)
   {
        $data = Validator::make($request->all(),
      [
        'name' => 'string',
            'description' => 'max:600',
      ]);
      $category= category::findorfail($id);
      return $category->update($request->all());
   }
   //***************************************** */

 

   public function delete( $id)
   {
    return category::findorfail($id)->delete();
        
   }
}
