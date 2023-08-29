<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminAuthController extends Controller
{
    public function login()
    {
        return view('backend.admins.login');
    }

    public function loginSubmit(Request $request)
    {
        $check = $request->all(); 

        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'] ])) {
            return redirect()
                ->route('admin.index')
                ->withMessage('Login Successfull');
        }else{
            return redirect()->back()->with('error','Invalid email or password');
        }
        
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
