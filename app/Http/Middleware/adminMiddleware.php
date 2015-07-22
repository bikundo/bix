<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class adminMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( ! Auth::user()->is('admin')) {
            Log::info('user is not admin');

            return redirect()->to('/')->with('message', 'You are not allowed to view that page mate!');
        }
        Log::info('user is admin');

        return $next($request);
    }
}
