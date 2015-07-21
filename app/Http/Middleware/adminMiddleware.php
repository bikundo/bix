<?php
namespace App\Http\Middleware;

use Closure;

class adminMiddleware
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
        if (!\Auth::user()->is('admin')) {
            \Log::info('user is not admin');
            return redirect()
                ->to('/');
        }
        \Log::info('user is admin');
        return $next($request);
    }
}
