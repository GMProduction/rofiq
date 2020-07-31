<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\User;

class UserController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $user = User::where('roles','member ')->get();
        return view('admin.user.user')->with(['user' => $user]);
    }

}
