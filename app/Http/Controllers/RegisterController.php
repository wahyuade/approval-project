<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\User;

class RegisterController extends Controller
{
    public function postDataRegister(Request $req)
    {
        $name = $req->input('name');
        $email =  $req->input('email');
        $password = $req->input('password');

        $check = User::where('email', $email)->count();

        if($check == 0){
            $storeUser = new User();
            $storeUser->name = $name;
            $storeUser->email = $email;
            $storeUser->password = Crypt::encrypt($password);
            if($storeUser->save()){    
                return response()->json(['success'=>true,'message'=>'User successfull added']);
            }else{
                return response()->json(['success'=>false,'message'=>'Failed add user']);
            }
        }else{
            return response()->json(['success'=>false,'message'=>'Duplicated user']);
        }

    }
}