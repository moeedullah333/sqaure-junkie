<?php



namespace App\Http\Middleware;



use Closure;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;



class AdminCheck

{

    /**

     * Handle an incoming request.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \Closure  $next

     * @return mixed

     */

    public function handle(Request $request, Closure $next)

    {

        if (Auth::user() && Auth::user()->user_role!=1) {

            return back();

        }

        

        return $next($request);

    }

}

