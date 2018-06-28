<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Auth;

class isEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $req, Closure $next)
    {
        // dd($req->user());
        if(Auth::user()->role == "editor" || Auth::user()->role == "admin")
            return $next($req);
        else
            return response()->json(['error'=> "You haven't permission to this page 1"],401);
    }
}
