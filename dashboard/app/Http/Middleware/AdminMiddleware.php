<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(Auth::user()->role);

        if(Auth::check())
        {

         if(Auth::user()->role == '1') //1=admin & 0=user
         {
            return $next($request);
         } 
         else{
        return redirect('/home')->with('status','Access Denied! As you are not an Admin');
         } 
        }
        else{
        return redirect('/login')->with('status','Please Login First');
        }
    
    }
}
