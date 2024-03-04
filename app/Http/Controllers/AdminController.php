<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\resturant;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\resturanrequest;

class AdminController extends Controller
{
    public function admin()
   {
 
    return view('admin.panel');
   }

 public function categoryList()
 {
    $categories= category::all();
   return view('admin.Category-list',['categories'=>$categories]);
 }

 public function productList()
 {

  $products=product::all();
   return view('admin.Product-List',['products' => $products]);
 }

 public function resturantList()
 {
    $resturants=resturant::all();
   return view('admin.Resturant-List',['resturants'=> $resturants]);
 }

 public function resturantCreate()
 {
  return view('admin.Resturant-Create');
 }

 public function resturantInsert(resturanrequest $request)
 {
  $request->validated();
  
    $name = $request->input('name');
    $address = $request -> input('Address');
    $is_list = $request -> input('is_list');
    $Description = $request->input('Description');

    $image = time().'-'. $request -> file('image') ->getClientOriginalName();
    $request -> file('image')->move(public_path('image') ,  $image);
    resturant::create([
      'title' => $name,
      'address' =>$address,
      'image' => $image ,
      'is_list' =>  $is_list,
      'description' => $Description
      
    ]);

   return Redirect (route('resturant-list'));
 }


 public function categoryCreate()
 {
    return view('admin.Category-Create');
 }

 public function categoryInsert(Request $request)
 {
    $name = $request -> input('name');
    $description = $request -> input('Description');

    category:: create([
      'name' => $name,
      'description' => $description
    ]);

    return Redirect (route('category-list'));

 }

 public function productCreate()
 {
  $categories=category::all();
  $resturants = resturant ::all();

    return view('admin.Product-Create' , [
      'categories' =>  $categories ,
     'resturants' => $resturants
    ]);
   

 }

 public function productInsert(Request $request)
 {
   $name= $request->input('name');
   $price= $request -> input('price');
   $category =$request->input('category');
   $resturant =$request->input('resturant');

   product::create([
    'name' => $name,
    'price' => $price,
    'category_id' => $category,
    'resturant_id' => $resturant,
   ]);

  return Redirect (route('product-list'));
 }


 public function resturantEdit($id)
 {
  $resturant = resturant::find($id) ;
  return view('admin.Resturant-Edite' , ['resturant' => $resturant]);
 }

 public function resturantUpdate(Request $request)
 {
  
  $resturant=resturant :: findorfail($request ->input('id'));

      $request -> validate([

        'Address' => 'required|max:500',

      ]);
    if ($resturant->title != $request->input('name')) {
      $request -> validate([
        'name' =>'required|string|unique:resturants,title',
      ]);
    }

    $image=false;
    if ($request -> file('image')) {
        $request ->validate([
          'image' => 'required|mimes:png,jpg|max:99999'
        ]);
        $image= time().'-'. $request -> file('image')->getClientOriginalName();
        $request -> file('image') ->move(public_path('image') , $image);
    }

    if ($image) {
      $resturant->update([
        'title' => $request->input('name'),
        'address' => $request -> input('Address'),
        'image' =>  $image,
        'is_list' => $request -> input('is_list') ?? 0 ,
        'description' =>$request -> input('Description')
      ]);
    }

    else {
      $resturant->update([
        'title' => $request->input('name'),
        'address' => $request -> input('Address'),
        'is_list' => $request -> input('is_list') ?? 0,
        'description' =>$request -> input('Description')
      
      ]);
    }

   

      return Redirect (route('resturant-list'));
 }

 public function categoryEdit($id)
 {
  $category = category::find($id);
    return view('admin.Category-Edit',['category' => $category]);
 }

 public function categoryUpdate(Request $request)
 {
   category :: findorfail($request->input('id'))
    ->update([
      'name' => $request->input('name'),
      'description' => $request -> input('Description')
    ]);

    return Redirect(route('category-list'));
 }

 public function productEdit($id)
 {
    $product =product::find($id);
    $resturants = resturant::all();
    $categories = category::all();
    return view('admin.Product-Edit' ,['product' => $product , 'resturants' => $resturants , 'categories' => $categories ]);
 }

 public function productUpdate(Request $request)
 {
    product ::findorfail($request -> input('id'))
    ->update([
      'name' =>$request->input('name'),
      'price' =>$request->input('price'),
      'category_id' =>$request->input('category'),
      'resturant_id' =>$request->input('resturant')
    ]);
    return Redirect (route('product-list'));
 }

 public function categoryDelete($id)
 {
    category::findorfail($id)
    ->delete();

    return redirect(route('category-list'));
 }

 public function resturantDelete($id)
 {
    resturant::findorfail($id)
    ->delete();

    return redirect(route('resturant-list'));
 }

 public function productDelete($id)
 {
    product ::findorfail($id)
    ->delete();

    return redirect(route('product-list'));
 }

}
