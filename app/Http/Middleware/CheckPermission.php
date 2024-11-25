<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $requiredPermission = null): Response
    {
        $user = Auth::user();

        // Ensure the user has permissions loaded

        // Allow access if no specific permission is required (unguarded routes)
        if (is_null($requiredPermission)) {
            return $next($request);
        }

        // Check if the user has the required permission
        if (!$user->permissions->contains('permission', $requiredPermission)) {
            return response()->json([
                'error' => 'Unauthorized access. Missing required permission: ' . $requiredPermission,
            ], 403);
        }
        return $next($request);
    }
}
