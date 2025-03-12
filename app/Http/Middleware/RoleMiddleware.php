<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{

    public function handle(Request $request, Closure $next, ...$accessRules)
    {
        // Allow guests to access non-protected routes
        if (!Auth::check()) {
            return redirect('/'); // Redirect unauthenticated users to homepage instead of infinite /login loop
        }

        $user = Auth::user();

        // Check if user has the required role or belongs to the required group
        $userRoles = $user->role ? [$user->role->name] : [];
        $userGroups = $user->groups->pluck('name')->toArray(); // Get all user groups as an array

        $allowedRolesOrGroups = array_map('trim', $accessRules);

        // If user has a required role or belongs to a required group, allow access
        if (array_intersect($allowedRolesOrGroups, $userRoles) || array_intersect($allowedRolesOrGroups, $userGroups)) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
