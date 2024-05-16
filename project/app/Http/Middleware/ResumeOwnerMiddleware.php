<?php

namespace App\Http\Middleware;

use App\Models\Resume;
use Closure;
use ErrorException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResumeOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {


            if (($request->user()->role == 0 && $request->user()->id == Resume::find($request->id)->id) || ($request->user()->role == 2)) {
                return $next($request);

            }
            return response("you should be owner", 403);
        }
        catch (ErrorException){
            return response("source not found", 404);
        }
    }
}
