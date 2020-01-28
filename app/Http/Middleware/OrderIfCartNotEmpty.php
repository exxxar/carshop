<?php

namespace AutoKit\Http\Middleware;

use AutoKit\MoreProducts;
use AutoKit\Vinrequest;
use Closure;
use Cart;
use Illuminate\Support\Facades\Auth;

class OrderIfCartNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ((Auth::check()&&Vinrequest::where("user_id",Auth::id())->count()>0)||
            (!Auth::check()&&Vinrequest::where("session",$request->getSession()->getId())->count()>0)||
            Cart::isNotEmpty()

        ) {
            return $next($request);
        }

        return abort(404);
    }
}
