<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;

class UserController extends Controller
{


    public function edit()
    {

        $data['user'] = User::find(\Auth::id());
        return view('dashboard.profile',$data);

    }
    public function update(ProfileRequest $request)
    {

        $User = User::find(\Auth::id());
        $User->update([
            'password' => \Hash::make($request->input('password'))
        ]);
        return back()->with('message','تم تغيير كلمةا المرور بنجاح');
    }
}
