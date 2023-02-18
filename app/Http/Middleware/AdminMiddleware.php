<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        // echo "admin middleware".session('admin');
        if(session('admin')){
            $ad = session('admin_data');
            $a = Admin::Find($ad->id);
            if (empty($a)){
                return redirect('/admin/login');
            }
            return $next($request);
        }

        return redirect('/admin/login');
    }
}
