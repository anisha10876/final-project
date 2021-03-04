<?php

namespace App\Http\Middleware;
use Illuminate\support\Facades\Auth;


use Closure;

class AdminMIddleware
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

        foreach(Auth::user()->roles as $urole){
            if($urole->title == 'Admin'){
                return $next($request);
            }
            else{
                return redirect()->route('home');
            }
        }
    }
}
