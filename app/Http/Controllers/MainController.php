<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function dashboard(Request $request){
        $user = User::where('id_user',session('LoggedUser'))->first();
        return view('admin.dashboard',compact('user'));
    }
}
