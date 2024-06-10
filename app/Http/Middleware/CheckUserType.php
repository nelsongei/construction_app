<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if (auth()->check()) {
            $userType = auth()->user()->user_type_id;
            if ($userType===1)
            {
                redirect('/home');
            }
            elseif ($userType===2)
            {
                redirect('/vendors_dashboard');
            }
            elseif($userType===3)
            {
                redirect('client_dashboard');
            }
        }
        return $next($request);
    }
}
