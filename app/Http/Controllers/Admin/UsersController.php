<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    //
    public function LoginUser(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $Check_user = User::where('email', '=', $request->email)->first();

        if($Check_user){

           if(Hash::check($request->password, $Check_user->password)){
            $request->session()->put('loginId', $Check_user->id);
                return redirect('admin/dashboard');
           }
           else{
                return back()->with('error', 'Password not matches.');
           }
        }
        else{
            return back()->with('error', 'This email is not registerd.');
        }
    }
    public function dashboard()
    {

        return view('admin.layout.master');
    }

    public function LogoutUser()
    {
    
        if(session()->has('loginId')){
            // dd(session()->get('loginId', '100'));
            Session::pull('loginId');
            return redirect('admin');
        }
    }
    public function index()
    {
        return view('frontend.login');
    }
}
