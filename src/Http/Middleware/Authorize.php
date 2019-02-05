<?php

namespace Coreproc\NovaEcho\Http\Middleware;

use Coreproc\NovaEcho\NovaEcho;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(NovaEcho::class)->authorize($request) ? $next($request) : abort(403);
    }
}
