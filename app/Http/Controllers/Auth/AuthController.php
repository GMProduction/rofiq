<?php

namespace App\Http\Controllers\Auth;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends CustomController
{
    //
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function pageLogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password']
        ];
        if ($this->isAuth($credentials)) {
            $roles = Auth::user()->roles;
            if ($roles !== 'member') {
                return redirect('/admin');
            }
            return redirect('/user');
        }
        return redirect()->back()->withInput()->with('failed', 'Periksa Kembali Username dan Password Anda');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        if ($this->postField('password') !== $this->postField('password_confirmation')) {
            return redirect()->back()->with(['fail' => 'Password Not Match']);
        }

        $roles = $this->postField('roles');
        $data  = [
            'username' => $this->postField('username'),
            'email'    => $this->postField('email'),
            'password' => Hash::make($this->postField('password')),
            'roles'    => $roles,
            'nama' =>  $this->postField('nama'),
            'phone' =>  $this->postField('phone'),
            'alamat' =>  $this->postField('alamat'),
        ];

        if ($roles === 'admin') {
            $redirect = '/admin';
        } else {
            $redirect = '/';
        }
        $user = $this->insert(User::class, $data);
        Auth::loginUsingId($user->id);

        return redirect($redirect);
    }
}
