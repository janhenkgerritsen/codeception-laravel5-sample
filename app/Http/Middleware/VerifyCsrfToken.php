<?php namespace App\Http\Middleware;

use Closure;

class VerifyCsrfToken extends \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken {

    /**
     * @param \Illuminate\Http\Request $request
     * @param callable $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Do not perform CSRF checks for API requests
        if (preg_match("#^/api#", $request->path()) !== false) {
            return $next($request);
        }

        return parent::handle($request, $next);
    }
}