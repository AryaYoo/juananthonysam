<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('admin_authenticated') || $request->session()->get('admin_authenticated') !== true) {
            return redirect()->route('admin.login')->with('warning', 'Silakan login terlebih dahulu untuk mengakses dashboard.');
        }

        return $next($request);
    }
}
