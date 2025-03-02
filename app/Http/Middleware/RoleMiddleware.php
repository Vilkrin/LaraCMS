<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()) {
            return redirect('/login'); // Ensure user is authenticated
        }

        $user = Auth::user();

        // Fetch allowed roles from the database (cache for performance)
        $allowedRoles = Cache::remember('admin_roles', 60, function () {
            return \App\Models\Role::where('can_access_admin', true)->pluck('name')->toArray();
        });

        // Check if the user's role is allowed
        if (!in_array($user->role->name, $allowedRoles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
