<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AgencyMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        
        if (Auth::user()->hasPermissionTo('Administer roles & permissions')) //If user has this //permission
        {
            return $next($request);
        }

        if ($request->is('companies/create'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Create Company'))
            {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }

        if ($request->is('companies/*/edit')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Edit Company')) {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('Delete Company'))
            {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }

        return $next($request);
    }
}
