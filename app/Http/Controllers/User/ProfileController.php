<?php

namespace App\Http\Controllers\User;

use App\Helper\CustomController;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class ProfileController extends CustomController
{
    public function __construct()
    {
        parent::__construct(    );
    }

    public function index(){
        if($this->request->isMethod('POST')){
            $data = [
              'nama' => $this->postField('nama'),
              'email' => $this->postField('email'),
              'alamat' => $this->postField('alamat'),
              'phone' => $this->postField('phone'),
            ];
            $this->update(User::class, $data);
            return redirect()->back()->with(['success' => 'success']);
        }
        $user = User::where('id', auth()->user()->id)->first();

        return view('user.profil.profil')->with(['user' => $user]);
    }


}
