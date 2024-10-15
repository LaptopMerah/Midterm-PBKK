<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HandleUserType
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request, string): (Response) $next
     */
    public function handle(Request $request, Closure $next,string $user_type): Response
    {
        $role = UserType::from($user_type);

        if($request->user()->user_type === $role) {
            return $next($request);
        }

        abort(403, 'Forbidden, access denied');
    }
}
