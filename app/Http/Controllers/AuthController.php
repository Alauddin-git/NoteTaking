<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // user registration
    public function userRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {  
            $firstErrorMessage = $validator->errors()->first();
            toastr()->adderror($firstErrorMessage);
            return redirect()->to('/register')
            ->withInput();
        }

        $user = new User;
        $user->name = $request->user_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        toastr()->addsuccess('You Successfully Registered');
        return redirect()->to('/');
    }

    // user login
    public function userLogin(Request $request)
    {  
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            toastr()->addsuccess('You Successfully Loggin');
            return redirect()->intended(route('user.note.list'));      
              }
  
        return redirect()->to('/')->withError('Oppes! You have entered invalid credentials');
    }

    // user logout
    public function logout()
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
