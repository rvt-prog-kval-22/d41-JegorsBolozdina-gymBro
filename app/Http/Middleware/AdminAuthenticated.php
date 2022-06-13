<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)

    {
        if( Auth::check() )
        {
            /** @var User $user */
            $user = Auth::user();

            // if user is not superadmin take him back to the dashboard
            if ( $user->hasRole('user') || $user->hasRole('admin') ) {
                return redirect(route('dashboard'));
            }

            return $next($request);

        }
        abort(403);  // permission denied error
    }
}
