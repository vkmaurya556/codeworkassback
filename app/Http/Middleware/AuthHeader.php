<?php

namespace App\Http\Middleware;

use Closure;

class AuthHeader
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
        // return $request
        $auth = $request->header('AuthKey');
        if ($auth == env('AUTH_KEY')) {
            return $next($request);
        } else {
            return response()->json(["status" => false, "message" => "Invalid Auth"]);
        }
    }
}
