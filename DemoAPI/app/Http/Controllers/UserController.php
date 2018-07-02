<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;
use App\User;
use App\Repositories\IUserRepository;

class UserController extends Controller
{

    protected $user;
    // set the model
    public function __construct(IUserRepository $user)
    {
        $this->user = $user;
    }

    public function prepareResult($status, $data, $errors,$msg)
    {
        return ['status' => $status,'data'=> $data,'message' => $msg,'errors' => $errors];
    }

    public function validations($req, $type)
    {
        $errors = [];
        $error = false;
        if($type == "login"){
    
            $validator = Validator::make($req->all(),[
                'email'    => 'required|email|max:255',
                'password' => 'required',
            ]);
    
            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }
        }
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
            }
        }
        return ["error" => $error,"errors"=>$errors];
    }

    public function postLogin(Request $req)
    {
        $validate = $this->validations($req,"login");
        if($validate["error"])
        {
            return $this->prepareResult(false, [], $validate['errors'],"Error while validating user");
        }
        Auth::attempt([
            'email'    => $req->email,
            'password' => $req->password
        ]);
        $user = Auth::user();
        if(Auth::check())
        {
            return $this->prepareResult(true,  $user, [],"User Verified");
        }
        else
        {
            return $this->prepareResult(false, [] , ["password" => "Wrong password"],"Wrong password");
        }
    }

    public function postRegister(Request $req)
    {
        $validate = $this->validations($req,"register");
        if ($validate["error"]) { 
            return $this->prepareResult(false, [], $validate['errors'],"Error while validating user");          
        }
        $input = $req->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return $this->prepareResult(true,$user, [],"All results fetched");
    }

    public function getLogout()
    {
        Auth::logout();
        return $this->prepareResult(true,[], [],"Page login");
    }
    
    public function getUser()
    {
        $users = User::get();
        return $this->prepareResult(true,$users, [],"Show success");
    }

    public function editUser(Request $req, $id)
    {
        $findUser = User::find($id);
        if($findUser)
        {
            $findUser->name = $req->input('name');
            $this->user->update($req->only($this->user->getCriteria()), $id);
            return $this->prepareResult(true,$findUser,[],"Edit success");
        }
        else
            return $this->prepareResult(false, [] , "Unable to find user","User not found");
    }

    public function deleteUser($id)
    {
        $findUser = User::find($id);
        if($findUser)
        {
            $this->user->delete($id);
            return $this->prepareResult(true,[],[],"Delete User Successful");
        }
        else
            return $this->prepareResult(false, [] , "Unable to find user","User not found");
    }

    public function getUserById($id)
    {
        $findUser = User::find($id);
        if($findUser)
        {
            return $this->prepareResult(true,$findUser, [],"Show success");
        }
        else
            // echo "a";
            return $this->prepareResult(false, [] , "Unable to find user","User not found");
    }

}
