<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$type): Response
    {
        if (auth()->check() && auth()->user()->typeID !== $type) {
            return redirect('/');  
            // abort(403, 'Bạn không có quyền truy cập');
        }
        return $next($request);
    }
}