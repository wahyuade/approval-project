<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\User;

class LoginController extends Controller
{
    public function postLogin(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');

        if($this->loginProcess($email, $password))
        {   
            $remember_token = str_random(32);
            User::where('email', $email)->update(['remember_token'=>$remember_token]);
            return response()->json(['success'=>true, 'message'=>'Success Login !', 'token'=>$remember_token]);
        }
        else
        {
            return response()->json(['success'=>false, 'message'=>'Failed Login !']);
        }
    }

    private function loginProcess($data_email, $data_password){
        $data = User::where('email', $data_email)->first();
        if($data!=null)
        {
            $password = Crypt::decrypt($data->password);
            if($data_password == $password)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}
