<?php
/**
 * Created by PhpStorm.
 * User: Akash
 * Date: 5/22/2016
 * Time: 4:08 PM
 */
namespace App\Http\Controllers;
use App\Events\UserRegistered;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use App\User;
use Validator;
use Input;
use DB;

use Session;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Event;

use View;
use Auth;

class RegistrationController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function show()
    {

        return view('auth.register');
    }

    public function store(Request $request){

        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('register')->withInput()->withErrors($validator);
        }else{

            $user=New User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=\Hash::make($request->password);
            $user->save();
            Event::fire(new UserRegistered($user));
            Session::flash('success','User successfully added!');
            return Redirect()->back();
        }
    }
}