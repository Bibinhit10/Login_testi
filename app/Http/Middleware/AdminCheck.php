<?php

// Bibinhit_10 ***

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;


class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        

        $admin_data['user_name']=$request->session()->get('user_name');
        $admin_data['password']=$request->session()->get('password');

        if (!isset($admin_data['user_name']) || !isset($admin_data['password'])) {

            return redirect('admin/login');
        }
        
        $user=Admin::where('user_name', $admin_data['user_name'])->first();

        if (empty($user)) {
            return redirect('admin/login');
        }
            
        if (!Hash::check($admin_data['password'], $user['password'])) {
                
            return redirect('admin/login');

        }

        return $next($request);
    }
}
