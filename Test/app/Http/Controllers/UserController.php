<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {

        $data['title'] = 'Register';

        return view('user.register', $data);
    }

    public function registerAction(Request $request)
    {

        $request->validate([
            'user_name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',
        ]);
        $user = new User([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        return redirect('/login')->with('success', 'Registration Successful!');
    }

    public function login()
    {

        $data['title'] = 'Login';

        return view('user.login', $data);
    }

    public function loginAction(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $request->session()->regenerate();
            return redirect('/home_page')->with('success', 'Login Successful!');
        }

        return back()->with('password', 'Invalid user name or password');
    }

    public function change_pw()
    {

        $data['title'] = 'Change Password';

        return view('user.change_pw', $data);
    }

    public function change_pwAction(Request $request)
    {

        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|min:6',
            'password_confirmation' => 'required|same:new_password',
        ]);
        
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return redirect('/home_page')->with('success', 'Change Password Successful!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home_page');
    }
}
