<?php

namespace App\Http\Controllers;

use App\Models\resturant;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminResturantApiController extends Controller
{
    public function index()
    {
        return resturant::paginate(10);
    }

    //************************************************* */

    public function show($id)
    {
        return resturant::findorfail($id);

    }
    //************************************************* */

    public function create(Request $request)
    {
      
        $request->validate([
                'title' =>'required|unique:resturants,title',
                'address' => 'required|max:500',
                'image' => 'required|mimes:png,jpg'
            ]);

            // if ( $data->errors()->any()) {
            //     return $data->errors();
            // }
        
    
        if($request->hasFile('image')){
            $image = time().'-'.$request->file('image')->getClientOriginalName();
            $request -> file('image')->move(public_path('image') ,  $image);
        
            }
        //  $request -> file('image')->storeAs(('public/image') ,  $image);
            

        $resturant =  resturant::create([
                'title' => $request->title,
                'address' =>$request->address,
                'image' => $image ,
                'is_list' =>  $request->is_list,
                'description'=>$request->description
                
            ]);
            

            return  response(['resturant'=>$resturant], 201);
            
    }
    //************************************************* */

    public function update(Request $request, $id)
    {
        $resturant =resturant::findorfail($id);

        if ($resturant->title != $request->name) {
            $data = validator::make($request->all() ,[
                'name' =>'required|string|unique:resturants,title',
            ]);
          }

         if ($data->errors()->any()) {
            return $data ->errors();
             }
            return $resturant->update($request->all());
     

    }
    //************************************************* */

    public function delete($id)
    {
        return resturant::findorfail($id)->delete();
    }
    //************************************************* */

    public function search($q)
    {
        //  $q= $request ->get('q');
        
        $resturants =resturant::where('title' , 'like', '%'. $q.'%')->get();
        return response(['data' => $resturants]);
        
        //    return view('front.search' , ['resturants' => $resturants]);
    }

}
