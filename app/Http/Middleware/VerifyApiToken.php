<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyApiToken
{



    public function handle(Request $request, Closure $next)
    {
        if ($this->verify($request)) {
            return $next($request);
        }

        throw new TokenMismatchException;
    }



    public function verify($request): bool //optional return types
    {
        return ApiToken::select('id')->where([    // add select so Eloquent does not query for all fields
            'client' => $request->header('client'), // remove variable that is used only once
            'token'  => $request->header('token'),  // remove variable that is used only once
        ])->exists();
    }
}
