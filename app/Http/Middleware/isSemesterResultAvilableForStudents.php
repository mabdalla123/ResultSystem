<?php

namespace App\Http\Middleware;

use App\Models\Result;
use Closure;
use Illuminate\Http\Request;

class isSemesterResultAvilableForStudents
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $result = $request->route()->parameter('Result');
        $result = Result::find($result);
        if ($result->semester->is_available_for_students)
            return $next($request);
        else
            return abort(403);
    }
}
