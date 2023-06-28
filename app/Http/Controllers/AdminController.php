<?php

// Bibinhit_10 ***

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class AdminController extends Controller
{
    // user name = admin
    // password = admin =Hash-> $2y$10$qlOiXATp7I0vf0k8vq9o/uVm3K/.Uvhb7FPL5cQdTF/KcJFCGVJQ2
    public function AdminLogin(Request $request)
    {
        
        $result = "";

        if($request->login != null)
        {

            $admin_data =$request->validate([
                'user_name' => ['required','string'],
                'password' => ['required','string'],
            ]);
            

            $admin=Admin::where('user_name', $admin_data['user_name'])->first();

            if (!empty($admin)) {
                if (Hash::check($admin_data['password'], $admin['password'])) {
                        
                    session(['user_name' => $admin_data['user_name']]);
                    session(['password' => $admin_data['password']]);
            

                    return redirect('admin/index');


                }else {
                    $result='user name ya password eshtebah ast ..!';
                }
            }else {
                $result='user name ya password eshtebah ast ..!';
            };
        
        }        

        return view ('admin_login',[
            'result' => $result
        ]);

    }

    public function AdminIndex(Request $request)
    {

        $users=User::get();
        
        return view ('admin_index',[
            'users' => $users
        ]);

    }

}
