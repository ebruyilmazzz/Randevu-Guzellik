<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')
                ->with('error', 'Lütfen önce giriş yapın.');
        }

        if (!Auth::user()->isAdmin()) {
            return redirect()->route('home')
                ->with('error', 'Bu sayfaya erişim yetkiniz bulunmamaktadır.');
        }

        return $next($request);
    }
}
