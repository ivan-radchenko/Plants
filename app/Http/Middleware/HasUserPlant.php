<?php

namespace App\Http\Middleware;

use App\Models\Plants;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasUserPlant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $plant=$request->route()->parameters();
        $userID=Plants::find($plant)[0]['userID'];
        if ($userID===\Auth::user()->id){
            return $next($request);
        }
        abort(403);
    }
}
