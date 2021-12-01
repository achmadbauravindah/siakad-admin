<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Ini digunakan untuk melindungi Controller ini di middleware
        // Artinya gini, jika ada admin atau lodger yang sudah login, maka
        // akan dilindungi oleh midlewarenya, kecuali kalau dia logout (tidak login sama sekali)
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:mahasiswa')->except('logout');
        $this->middleware('guest:dosen')->except('logout');
    }

    public function rolesLogin(Request $request)
    {
        if ($request->level == 'mahasiswa') {
            return $this->mahasiswaLogin($request);
        }
        if ($request->level == 'dosen') {
            return $this->dosenLogin($request);
        }
    }

    // MAHASISWA
    public function mahasiswaLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required|alpha_num|min:5',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('mahasiswa')->attempt(['nim' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/mahasiswa');
        }
        session()->flash('error', 'Username atau Password salah');
        return back()->withInput($request->only('username'));
    }

    // DOSEN
    public function dosenLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required|alpha_num|min:5',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('dosen')->attempt(['nip' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/dosen');
        }
        session()->flash('error', 'Username atau Password salah');
        return back()->withInput($request->only('username'));
    }

    public function viewRolesLogin()
    {
        return view('auth.login');
    }

    // DOSEN
    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required|alpha_num|min:5',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/admin');
        }
        session()->flash('error', 'Username atau Password salah');
        return back()->withInput($request->only('username'));
    }

    public function viewAdminLogin()
    {
        return view('auth.admin.login');
    }

    public function disableDefaultAuth()
    {
        return view('auth.login');
    }
}
