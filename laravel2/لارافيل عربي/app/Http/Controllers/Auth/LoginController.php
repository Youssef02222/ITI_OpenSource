<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Models\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $username;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->getLoginMode();
    }

    private function getLoginMode()
{
    $login = request()->input('login_name');
    $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'academic_number';
    request()->merge([$fieldType => $login]);
    return $fieldType;
}

    //  public function login(Request $request)
    // {
    //     $input = $request->all();

    //     $this->validate($request, [
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'email';
    //     if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])) || auth()->attempt(array($fieldType => $input['number'], 'password' => $input['password'])))
    //     {
    //         $userRole = User::where('email', $input['email']);
    //         if($userRole == 'رئيس قسم' || $userRole == "الدعم الفني"){
    //             return redirect()->route('admin');
    //         }else{
    //             return redirect()->route('home');
    //         }
    //     }else{
    //         return redirect()->route('login')
    //             ->with('error','Email-Address And Password Are Wrong.');
    //     }

    // }
}
