<?php

namespace App\Http\Middleware;

use App\Service;
use Closure;
use Illuminate\Http\Request;

class ServiceEnabled
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $service = Service::find($request->segment(2));
        if (!$service->enabled) {
            flash()->error(trans('service.disabled'));
            return redirect()->back();
        }

        return $next($request);
    }
}
