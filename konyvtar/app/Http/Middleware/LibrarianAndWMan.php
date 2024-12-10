<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LibrarianAndWMan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !(Auth::user()->role < 3)) {//itt változtatom meg melyik szerep férhet hozá, 0,1,2,3 lásd user migrate fájl
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        return $next($request); 
    }
}
