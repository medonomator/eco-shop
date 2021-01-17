<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use Auth;

class LoginController extends Controller
{
    /**
     * Authenticate the client of the application.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(auth('web')->attempt($credentials)) {
            return view('index', ['products' => Product::paginate(15)]);
        } 
        
        return redirect('login')->with('error', 'Invalid username or password');    
    }

    /**
     * Authenticate the user of the application.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminAuthenticate(Request $request)
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

    /**
     * Log the client out of the application.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $sessionKey = auth()->guard('web')->getName();
        $request->session()->forget($sessionKey);
        return redirect('/');
    }

    /**
     * Client register
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clientRegister(Request $request)
    {
        $client = Client::where('email', $request->email)->first();

        if($client) {
            return redirect('login')->with('error', 'Invalid username or password');
        }

        $newClient = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        Auth::guard('web')->login($newClient);

        return redirect('/');
    }
}
