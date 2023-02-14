<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    
//    public function handle($request, Closure $next, $guard = null)
//    {
//        if (Auth::guard($guard)->check()) {
//            return redirect(RouteServiceProvider::HOME);
//        }
//
//        return $next($request);
//    }
    
    
    public function handle(Request $request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
            
            //$role_id = Auth::user()->role_idFk;  
            $role = Auth::user()->getRoleNames()->toArray();
            
            if ( $role[0] ) {// do your magic here
                switch ($role[0]) {
                    case 'super-admin':                    
                        return redirect()->route('admin.dashboard');
                        break;
                    case 'home-department':
                        return redirect()->route('companies.index');
                        break;
                    case 'dom':
                        return redirect()->route('companies.index');
                        break;
                    case 'so':
                        return redirect()->route('companies.index');
                        break;
                    case 'ds':
                        return redirect()->route('companies.index');
                        break;
                    case 'as':
                        return redirect()->route('companies.index');
                        break;
                    case 'ss':
                        return redirect()->route('companies.index');
                        break;

                    default:
                      return abort(403, 'Unauthorized action.');
                        //return redirect()->route('login')->with('error',"You don't have admin access.");
                    break;
                }            
            }        
                      
        }
        return $next($request);
    }
    
   
}
