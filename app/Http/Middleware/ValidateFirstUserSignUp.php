<?php

namespace App\Http\Middleware;

use Closure;

use App\User;
use function redirect;

class ValidateFirstUserSignUp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $usersCount = User::count();
        if ($usersCount > 0 && !auth()->check()){
            return redirect('/');
        }

        return $next($request);
    }
}
