<?php

namespace App\Http\Middleware;

use Closure;
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
    public function handle($request, Closure $next, $guard = null)
    {
        
        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.unconfirmedStudio');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    if (Auth::guard($guard)->check()) {
                        $previlege =  Auth::user()->previlege; 
                        $banned =  Auth::user()->banned;
                        if($banned == 1) {
                            Auth::logout();
                            return redirect('/');
                        }
                        else if($previlege == 0) return redirect('/');
                        else if($previlege == 1) return redirect('/studioMusik');
                    }
                }
                break;
        }

        return $next($request);
    }
}
