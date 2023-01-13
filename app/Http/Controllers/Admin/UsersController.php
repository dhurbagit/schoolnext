<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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

        if ($Check_user) {

            if (Hash::check($request->password, $Check_user->password)) {
                $request->session()->put('loginId', $Check_user->id);
                return redirect('admin/dashboard');
            } else {
                return back()->with('error', 'Password not matches.');
            }
        } else {
            return back()->with('error', 'This email is not registerd.');
        }
    }
    public function dashboard()
    {

        return view('admin.layout.master');
    }

    public function LogoutUser()
    {

        if (session()->has('loginId')) {
            // dd(session()->get('loginId', '100'));
            Session::pull('loginId');
            return redirect('admin');
        }
    }
    public function index()
    {
        return view('frontend.login');
    }

    public function view()
    {
        return view('admin.registrationUser.index');
    }

    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:50|regex:/[@$!%*#?&]/|confirmed',
            'password_confirmation' => 'required',
        ], [
            'password.confirmed' => 'Password Does not mathch',
            'password.regex' => 'Use some symbol like (@$!%*#?&)',
        ]
        );

        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['password'] = Hash::make($request->password);

        User::create($input);

        return redirect()->back()->with('message', 'User Registration successful !');

    }

    public function delete_user($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect()->back()->with('message', 'User Deleted successful !');
    }

    public function edit($id)
    {
        $editUser = User::find($id);
        return view('admin.registrationUser.index', compact('editUser'));
    }
}
