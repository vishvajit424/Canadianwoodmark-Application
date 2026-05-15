<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepartmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            abort(403);
        }
        $detail = auth()->user()->userdetails;


        if (!$detail) {
            abort(403, 'User department not assigned');
        }
        // Admin can access everything
        if ($detail->department === 'admin') {
            return $next($request);
        }


        if (!in_array($detail->department, $departments)) {
            abort(403, 'Unauthorized department access');
        }

        return $next($request);
    }
}
