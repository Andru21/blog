<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function check(Request $request){

        //Validate Request
        $request->validate([
            'mask'=> 'required',
            'password'=> 'required'
        ]);

        //Si pasa la validacion entonces continuara con: 

        $user = User::where('mask','=',$request->mask)->first();

        if ($user) {
            if($request->password == $user->password){
                
                //Si el password pasa redireccionamos al usuario

                $request->session()->put('LoggedUser', $user->id_user);
                return redirect()->route('home');
            }else{
                if (session()->has('LoggedUser') && ($request->path() != 'login')) {
                    return redirect(route('home'));
                    
                }
                return back()->with('fail','Contraseña incorrecta');
            }
        }else{
            return back()->with('fail','La cuenta especificada no se encuentra');
        }

    }
}
