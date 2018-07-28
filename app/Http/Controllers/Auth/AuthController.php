<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request;
use Auth;
use Input;
use Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function getLogin()
    {
        return View('auth.login');
    }

    public function postLogin()
    {
        $input = Input::all();
        if (count($input) > 0) {
            $credentials = [
                'email' => $input['email'],
                'password' => $input['password'],
            ];
            if (!Auth::attempt($credentials)) {
                Session::flash('error', 'Please enter correct email and password !');
                return redirect()->back();
            }
            $user = Auth::getLastAttempted();
            Auth::login($user, true);
            Session::flash('success', 'user successfully login');
            return redirect('admin/dashboard');
        } else {
            return view('auth.login')->withFlashDanger('Please enter correct email and password !');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        session()->flush();
        Session::flash('success','successfull logout ');
        return redirect('/admin/login');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
