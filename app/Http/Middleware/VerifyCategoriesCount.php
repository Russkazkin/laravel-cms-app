<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class VerifyCategoriesCount
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
        if(!Category::all()->count()) {

            session()->flash('warning', 'Please create at least one category');

            return redirect(route('categories.create'));
        }
        return $next($request);
    }
}
