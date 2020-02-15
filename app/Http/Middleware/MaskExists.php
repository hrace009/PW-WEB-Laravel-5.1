<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MaskExists
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
        $masks = array_dot(trans('shop.masks'));
        if (!in_array(ucwords(str_replace('-', ' ', $request->segment(2))), $masks)) {
            abort(404);
        }
        return $next($request);
    }
}
