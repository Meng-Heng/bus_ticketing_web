<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $requiredPermission = null)
    {
        $user = $request->user();
        // Allow access to public routes for unauthenticated users
        if (!$user) {
            return $next($request);
        }

        // Debug: Log the authenticated user
        Log::info('Authenticated User:', ['user_id' => $user->id, 'username' => $user->username]);

        $userPermissions = $user->user_permission()
        ->with('permission')
        ->get()
        ->pluck('permission.permission')
        ->toArray();

        // Debug: Log the user's permissions
        Log::info('User Permissions:', $userPermissions);

        // If no permission is assigned, use the default from auth.php
        $defaultPermission = config('permission.default');
        if (empty($userPermissions)) {
            $userPermissions[] = $defaultPermission;
        }

        // If the required permission matches the user's assigned permission, allow access
        if ($userPermissions === $requiredPermission) {
            return $next($request);
        }
        
        // Check if the required permission is null (unguarded routes)
        if ($requiredPermission === null) {
            return $next($request);
        }

        // Debug: Log the final permissions list
        Log::info('Final Permissions List:', $userPermissions);

        // Check if the required permission matches the user's permissions
        $requiredPermissions = explode('|', $requiredPermission);
        if (array_intersect($userPermissions, $requiredPermissions)) {
            return $next($request);
        }

        // Debug: Log a failed permission check
        Log::warning('Unauthorized Access Attempt:', [
            'user_id' => $user->id,
            'required_permission' => $requiredPermission,
            'user_permissions' => $userPermissions,
        ]);

        return redirect()->route('homepage');
        // Deny access for other cases
        // abort(403, 'Unauthorized. You do not have the right permission. Please leave!');
    }

}
