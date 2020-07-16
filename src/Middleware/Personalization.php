<?php

namespace Smony\Personalization\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Smony\Personalization\PersonalizationController;

class Personalization
{
    protected $node;

    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        new PersonalizationController();

        return $next($request);
    }

}
