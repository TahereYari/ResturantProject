<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserRegister;





class UserApiControllers extends Controller
{
  public function showUser() 
  {
        // return User::all();
        //********* */
      //  return response()->json(
      // [ "data"=> User::all(),
      //   "success"=>'success',
      //   "messages"=>'موفق'
      // ],
      //  status:200);

      //**************** */

      return response()->json(User::all(),status:200);
    
    
  }
  
    //********************************************************************* */

    public function register(Request $request)
    {
        $data = $request -> validate([
          'name' => 'required|string',
          'email' => 'required|email|unique:users,email',
          'password' => 'required'
        ]);
    
        $user = user::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password'])
        ]);

        $token =$user ->createToken('food2')->plainTextToken;
          return  response(['token' => $token,'user'=>$user], 200);
    
        

    }

    //************************************************************************** */
    public function login(Request $request)
    {
          $data = $request -> validate([
            
            'email' => 'required|email|',
            'password' => 'required|string'
          ]);

          $user = User::where('email' , '=', $data['email'])->first();
          if (!$user || ! Hash::check($data['password'] , $user ->password))
          {
                return response(['statuse' => "user not found"] , 401);

          }

          $token =$user ->createToken('food')->plainTextToken;
          return response(['token' => $token,'user'=>$user], 200);
      
    }

    //********************************************************************* */


    public function logout()
    {
      
      Auth::user()->tokens->delete();
      return response('done' , 200);
    }
}
