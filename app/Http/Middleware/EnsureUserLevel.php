<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserLevel
{
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('admin.login');
        }

        if (! empty($levels) && ! in_array($user->level, $levels, true)) {
            abort(403);
        }

        return $next($request);
    }
}
