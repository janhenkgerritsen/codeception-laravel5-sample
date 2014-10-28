<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken implements Middleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 *
	 * @throws TokenMismatchException
	 */
	public function handle($request, Closure $next)
	{
		if ($request->method() == 'GET' || $this->tokensMatch($request) || $this->isApiRequest($request))
		{
			return $next($request);
		}

		throw new TokenMismatchException;
	}

	/**
	 * Determine if the session and input CSRF tokens match.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return bool
	 */
	protected function tokensMatch($request)
	{
		return $request->session()->token() == $request->input('_token');
	}

	/**
	 * Is this an API request?
	 * @param $request
	 * @return bool
	 */
	protected function isApiRequest($request)
	{
		return (boolean) preg_match('/^api/', $request->path());
	}
}
