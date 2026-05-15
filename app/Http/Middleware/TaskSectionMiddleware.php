<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TaskSectionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $task = $request->route('task');
        $user = auth()->user();

        if (!$task) {
            abort(404);
        }

        // Admin override
        if ($user->detail?->department === 'admin') {
            return $next($request);
        }

        // Current task status (active section)
        $currentSection = $task->status;

        // User department
        $userDepartment = $user->detail?->department;

        // Only current section user allowed
        if ($currentSection !== $userDepartment) {
            abort(403, 'This section is not assigned to you yet');
        }

        return $next($request);
    }
}
