<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Category;

class VerifyCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Category::all()->count() == 0) {
            Session()->flash('danger', 'Must have at least 1 category!');
            return redirect('/admin/Category');
        }

        return $next($request);
    }
}
