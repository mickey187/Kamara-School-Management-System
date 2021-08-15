<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

     $roles =  Auth::user()->roles;
     $role_name = null;
     foreach ($roles as $row) {

         $role_name = $row->role_name;
     }



        switch ($role_name) {
            case 'finance':
                return redirect()->route('finance/financeDashboard');
                break;
            case 'teacher':
                return redirect('teacherDashBoard');
                break;
            case 'student':
                return "This is Student";
                break;
            case 'admin':
                return redirect()->intended(RouteServiceProvider::HOME);
                break;
            case 'parent':
                return redirect('parentDashboard');
                break;
            default:
                return 'Default';
           // return redirect()->intended(RouteServiceProvider::HOME);
                break;
        }

       // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
