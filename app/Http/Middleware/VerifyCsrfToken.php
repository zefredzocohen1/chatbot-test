<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/*',
    ];

    public function handle($request, \Closure $next)
    {
        foreach ($this->except as $except) {
            if ($request->is($except)) {
                return $next($request);
            }
        }

        return parent::handle($request, $next);
    }
}
