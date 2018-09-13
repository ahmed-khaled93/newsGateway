<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        // dd($request);
        if ($request->user() === null) 
        {
            return redirect('/');
        }

        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;
            // dd($request->user()->hasAnyRole($roles));
// dd($actions['roles']);
        if($request->user()->hasAnyRole($roles) || !$roles)
        {
            return $next($request);
        }

        return back();
    }
}
