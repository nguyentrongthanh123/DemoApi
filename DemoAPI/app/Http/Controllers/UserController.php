<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;
use App\User;
// use Carbon\Carbon;
class UserController extends Controller
{
    function postLogin(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 401);            
            
        } // end if check $validator
        Auth::attempt([
            'email'    => $req->email,
            'password' => $req->password
        ]);
        if(Auth::check())
        {
            $user = Auth::user();
            $success['token'] =  $user->createToken('My Token')->accessToken;
            return response()->json(['success'=>$success],200);
        } // end if Auth:check
        else
        {
            return response()->json(['error'=>'Info login Incorrect'],400);
        } // end else
    } // end postLogin

    function postRegister(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name'        => 'required',
            'email'       => 'required|email',
            'password'    => 'required',
            're_password' => 'required|same:password',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }// end if check $validator
 
        $input = $req->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('My Token')->accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], 200);

    } // end postRegister

    function getUser()
    {
        $user = User::get();
        return response()->json(['success'=>$user],200);
    } // end getUser

    function editUser(Request $req, $id)
    {
        $findUser = User::findOrFail($id);
        if($findUser)
        {
            $findUser->name = $req->input('name');
            $findUser->save();
            return response()->json(['success'=>"Update User Successful",'info'=>$findUser], 200);
        }// end if
        else
            return response()->json(['error'=>'Not found id user'],400);
    } // end editUser

    function deleteUser($id)
    {
        $findUser = User::findOrFail($id);
        if($findUser)
        {
            $findUser->delete();
            return response()->json(['success'=>"Delete User Successful"], 200);
        }// end if
        else
            return response()->json(['error'=>'Not found id user'],400);
    }
}
