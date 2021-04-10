<?php

namespace App\Http\Middleware;

use Closure;

class PhoneValidator
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

        if($request->user()->phone_verify == false){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
