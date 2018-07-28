<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;


use App\Http\Requests;
use Redirect;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Input;
use DB;
use Session;

USE Auth;


class UserController extends Controller
{
    //
    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/user/create')->withInput()->withErrors($validator);
        } else {
            $user = New User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = \Hash::make($request->password);
            $user->save();
            Session::flash('success', 'User successfully created!');
            return Redirect('admin/user/show');
        }
    }

    public function show()
    {
        $user = User::all();
        return view('admin.user.view')->with('users', $user);
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.user.edit', compact('user'));
    }

    public function update($user_id, Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/user/create')->withInput()->withErrors($validator);
        } else {
            $user = User::find($user_id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            Session::flash('success', 'User recods successfully updated!');
            return Redirect('admin/user/show');
        }
    }

    public function destroy($user_id)
    {
        $delete_user = User::destroy($user_id);
        if ($delete_user) {
            Session::flash('success', 'User recods successfully deleted!');
            return Redirect('admin/user/show');
        }

    }

}
