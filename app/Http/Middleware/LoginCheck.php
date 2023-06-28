<?php

// Bibinhit_10 ***

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user_data['phone_number']=$request->session()->get('phone_number');
        $user_data['password']=$request->session()->get('password');

        if (!isset($user_data['phone_number']) || !isset($user_data['password'])) {

            return redirect('login');
        }
        
        $user=User::where('phone_number', $user_data['phone_number'])->first();

        if (empty($user)) {
            return redirect('login');
        }
            
        if (!Hash::check($user_data['password'], $user['password'])) {
                
            return redirect('login');

        }


        return $next($request);
    }
}
