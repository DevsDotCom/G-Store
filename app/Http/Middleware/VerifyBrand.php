<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Brand;

class VerifyBrand
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Brand::all()->count() == 0) {
            Session()->flash('danger', 'Must have at least 1 Brand!');
            return redirect('/admin/Brand');
        }

        return $next($request);
    }
}
