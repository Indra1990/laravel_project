<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/barang_order';


    protected function authenticated($request, $user)
    {
        if($user->role === 2 ) {
            return redirect()->intended('admin/home');
        }

        alert()->success('Selamat Datang','Berhasil Login')->persistent('Close');
        return redirect()->intended('/barang_order');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   

        $this->middleware('guest', ['except' => 'logout']);
    }

     public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        alert()->success('Selamat Datang Kembali','Berhasil Logout')->persistent('Close');

        return redirect('/login')->with('getLogout', 'selamat datang kembali!'); 
    }


}
