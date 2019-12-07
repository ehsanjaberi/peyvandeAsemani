<?php

namespace App\Http\Controllers\Panel\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use RegistersUsers;
    //
    public function show()
    {
        $users = User::all(['username']);
        for ($i = 0; $i < count($users); $i++)
            $usernames[] = $users[$i]->username;
        $helpers = DB::table('helpers')->where('help_type','=',1)->whereNotIn('national_code',$usernames)->get(['national_code','first_name','last_name']);
        return view('panel.user.insert')->with('helpers', $helpers);
    }
    public function insert(Request $request)
    {
        $newUser = new User;
        $newUser->username = $request->username;
        $newUser->password = Hash::make($request->password);
        $newUser->role_id = 2;
        $newUser->last_login = '0000/00/00';
        $newUser->last_logout = '0000/00/00';
        $newUser->save();
        return view('panel.user.insert');
    }
}
