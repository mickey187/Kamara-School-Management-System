<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $admin ,$finance, $student)
    {

        // $roles = Auth::check() ? Auth::user()->role->pluck('role_name')->toArray() : [];
        // if (in_array($finance, $roles)) {
        //     return $next($request);
        // }
        // else if (in_array($student, $roles)) {
        //     return $next($request);
        // } 


    if (Auth::check()) {
        $roles =  Auth::user()->roles;
        $role_name = null;
        foreach ($roles as $row) {
        $role_name = $row->role_name;
        
          }
    
        
     }

     if ($finance == $role_name) {
         return $next($request);
     }
     elseif ($student == $role_name) {
         return $next($request);
     }
     elseif ($admin == $role_name) {
        return $next($request);
     }

     return response()->view('errors.401',[],401);
    // return redirect()->intended(RouteServiceProvider::HOME);
        //return $next($request);
    }
}
