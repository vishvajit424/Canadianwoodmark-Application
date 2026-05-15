<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $task = $request->route('task');

        if (!$task) {
            abort(404);
        }

        // Admin can access all tasks
        if (auth()->user()->detail?->department === 'admin') {
            return $next($request);
        }

        // Check if user is assigned to this task
        $isAssigned = $task->users()
            ->where('users.id', auth()->id())
            ->exists();

        if (!$isAssigned) {
            abort(403, 'You are not assigned to this task');
        }

        return $next($request);
    }
}
