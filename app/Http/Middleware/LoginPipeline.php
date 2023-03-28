<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginPipeline
{
    protected $pipes = [
        \App\Http\Middleware\CheckLoggedIn::class,
        \App\Http\Middleware\CheckAccountActivated::class,
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $pipeline = app(\Illuminate\Pipeline\Pipeline::class);

        return $pipeline
            ->send($request)
            ->through($this->pipes)
            ->then($next);
    }
}
