<?php

// Bibinhit_10 ***

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    
    public function SignUp(Request $request)
    {
        
        $result = "";

        if($request->SignUp != null)
        {
            
            $user_data =$request->validate([
                'name' => ['required','string'],
                'phone_number' => ['required','string','unique:users,phone_number','regex:/^09\d{9}$/'],
                'password' => ['required','string'],
                'password_confirm' => ['required','string'],
            ]);
            
            if ( $user_data['password']==$user_data['password_confirm'] ) {
                
                $user_data['password'] = Hash::make($user_data['password']);

                User::create($user_data);

                $result=" sabt shod . ";

            }else {
                
                $result=' Password is wrong ! ';

            }
            
        }

        return view ('/sign_up',[ 
            'result' => $result
        ]);

        
    }

    
    public function login( Request $request)
    {
        $result = "";

        if($request->login != null)
        {

            $user_data =$request->validate([
                'phone_number' => ['required','string','regex:/^09\d{9}$/'],
                'password' => ['required','string'],
            ]);
            
            
            $user=User::where('phone_number', $user_data['phone_number'])->first();

            if (!empty($user)) {
                if (Hash::check($user_data['password'], $user['password'])) {
                        
                    session(['phone_number' => $user_data['phone_number']]);
                    session(['password' => $user_data['password']]);
            

                    return redirect('index');
                    // dd($request->session()->get('phone_number'));


                }else {
                    $result='phone_number ya password eshtebah ast ..!';
                }
            }else {
                $result='phone_number ya password eshtebah ast ..!';
            };
        
        }

        return view ('/login',[ 
            'result' => $result
        ]);
        
    }


    public function index(Request $request)
    {
        $result = "";
        $phone=$request->session()->get('phone_number');
        
        if($request->submit != null)
        {
            $new_data =$request->validate([
                'name' => ['nullable','string'],
                'email' => ['nullable','string'],
                'national_code' => ['nullable','string'],
                'addres' => ['nullable','string'],                
            ]);
            
            User::where('phone_number',$phone)->update($new_data);

        }

        $result=User::where('phone_number',$phone)->get();

        
        return view ('/index',[ 
            'results' => $result
        ]);


    }


}
