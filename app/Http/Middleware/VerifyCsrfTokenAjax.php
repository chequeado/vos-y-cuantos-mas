<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

/**
 * Class VerifyCsrfToken
 * @package App\Http\Middleware
 */
class VerifyCsrfTokenAjax extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, \Closure $next)
    {

        if ($this->tokensMatch($request)) {
            return $this->addCookieToResponse($request, $next($request));
        } else {
        	abort(403, 'Unauthorized action.');
        	return $next($request);
        }

//        throw new TokenMismatchException;
    }
}
