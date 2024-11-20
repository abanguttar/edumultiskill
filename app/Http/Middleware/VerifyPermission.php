<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class VerifyPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission_id): Response
    {

        if (Auth::user()->tipe_user == 99) {
            return $next($request);
        }

        $user_id = Auth::user()->id;
        $cache_key = 'user_permissions_' . $user_id;

        // $permissions = Cache::remember($cache_key, Carbon::now()->addHours(24), function () use ($user_id) {
        //     return  DB::table('user_permissions')->where('user_id', $user_id)->pluck('permission_id')->toArray();
        // });

        $permissions =  DB::table('user_permissions')->where('user_id', $user_id)->pluck('permission_id')->toArray();

        if (in_array($permission_id, $permissions)) {
            return $next($request);
        }
        $request->session()->flash('error-permission', 'Anda tidak memiliki akses membuka halaman ini!');
        return redirect()->back();
    }
}
