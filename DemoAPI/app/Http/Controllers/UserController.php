<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;
use App\User;
use App\Repositories\Repository;

// use Carbon\Carbon;
class UserController extends Controller
{

    protected $muser;
    public function __construct(User $user)
    {
        // set the model
        $this->muser = new Repository($user);
    }

    function prepareResult($status, $data, $errors,$msg)
    {
        return ['status' => $status,'data'=> $data,'message' => $msg,'errors' => $errors];
    }// end prepareResult

    function validations($req, $type)
    {
        $errors = [ ];
 
        $error = false;
    
        if($type == "login"){
    
            $validator = Validator::make($req->all(),[
                'email'    => 'required|email|max:255',
                'password' => 'required',
            ]);
    
            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }// end if $validator
        }// end if $type
        else if($type == "register")
        {
            $validator = Validator::make($req->all(), [
                'name'        => 'required',
                'email'       => 'required|email|unique:users',
                'password'    => 'required',
                're_password' => 'required|same:password',
            ]);
            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }// end if $validator
        }// end else if $type
        return ["error" => $error,"errors"=>$errors];
    }// end validations

    function postLogin(Request $req)
    {
        $validate = $this->validations($req,"login");
        if($validate["error"])
        {
            return $this->prepareResult(false, [], $validate['errors'],"Error while validating user");
        }

        // } // end if check $validator
        Auth::attempt([
            'email'    => $req->email,
            'password' => $req->password
        ]);
        $user = Auth::user();
        if(Auth::check())
        {
            return $this->prepareResult(true,  $user, [],"User Verified");
        } // end if Auth:check
        else
        {
            return $this->prepareResult(false, [] , ["password" => "Wrong password"],"Wrong password");
        } // end else
    } // end postLogin

    function postRegister(Request $req)
    {
        
        $validate = $this->validations($req,"register");
        if ($validate["error"]) { 
            return $this->prepareResult(false, [], $validate['errors'],"Error while validating user");          
        }// end if check $validator
 
        $input = $req->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return $this->prepareResult(201,$user, [],"All results fetched");

    } // end postRegister

    function getUser()
    {
        $users = User::get();
        return $this->prepareResult(true,$users, [],"Show success");
    } // end getUser

    function editUser(Request $req, $id)
    {
        $findUser = User::find($id);
        if($findUser)
        {
            $findUser->name = $req->input('name');
            $this->muser->update($req->only($this->muser->getModel()->fillable), $id);
            return $this->prepareResult(true,$findUser,[],"Edit success");
        }// end if
        else
            return $this->prepareResult(false, [] , "Unable to find user","User not found");
    } // end editUser

    function deleteUser($id)
    {
        $findUser = $this->muser->findById($id);
        if($findUser)
        {
            $this->muser->delete($id);
            return $this->prepareResult(true,[],[],"Delete User Successful");
        }// end if
        else
            return $this->prepareResult(false, [] , "Unable to find user","User not found");
    }

    function getUserById($id)
    {
        $findUser = $this->muser->findById($id);
        if($findUser)
        {
            return $this->prepareResult(true,$findUser, [],"Show success");
        }
        else
            return $this->prepareResult(false, [] , "Unable to find user","User not found");
    }// end getUserById
}
