<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect('admin-login');
        }

        return view('admin.index');
    }

    /**
     * Authenticate the user of the application.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(auth('admin')->attempt($credentials)) {
            return view('admin.index');
        } else {
            return redirect('admin-login')->with('error', 'Invalid username or password');
        }    
    }

    /**
     * Log the user out of the application.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminLogout(Request $request)
    {   
        Auth::guard('admin')->logout();
        $sessionKey = auth()->guard('admin')->getName();
        $request->session()->forget($sessionKey);
        return redirect('admin-login');
    }
}
