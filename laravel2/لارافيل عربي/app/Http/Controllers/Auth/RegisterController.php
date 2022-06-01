<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $errors = $this->errors();
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','min:6','confirmed'],
            'profession' => ['required', Rule::in(['متدرب', 'مدرب'])],
            'terms' => ['required'],
        ],$errors);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model|User
     * @throws Exception
     */
    protected function create(array $data)
    {
       $users=  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profession' => $data['profession'],
            'academic_number'=> random_int(10000000, 99999999)
        ]);
       if ($users){

           $email = $data['email'];
           $details = [
               'title'=>trans('email.subject'),
               'email' => $users->email,
               'password'=>$data['password'],
               'academic_number' => $users->academic_number,
           ];
         //  Mail::to($email)->send(new \App\Mail\newregistration($details));
       }
       return $users;


    }

    public function errors()
    {
        return [
            'name.unique' =>trans('auth.name'),
            'terms.required' => trans('auth.terms'),
            'profession.required' => trans('auth.profession'),
            'profession.in' => trans('auth.profession_in'),
            'password.min' =>trans('auth.password'),
            'password.confirmed' => trans('auth.password_confirmed'),
        ];
    }
}
