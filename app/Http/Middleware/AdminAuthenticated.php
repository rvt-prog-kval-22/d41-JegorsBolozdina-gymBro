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

            // if user is not admin take him to his dashboard
            if ( $user->hasRole('user') ) {
                return redirect(route('dashboard'));
            }

            // superadmin only for now since the panel only includes user role change
            else if ( $user->hasRole('superadmin') ) {
                return $next($request);
            }
        }
        abort(403);  // permission denied error
    }
}
