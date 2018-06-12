<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class StudioMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->previlege==1 )
        {
            return redirect('studioMusik');
        }
        return $next($request);
        
    }
}
