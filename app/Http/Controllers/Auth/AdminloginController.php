<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminloginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin',['except' => 'adminlogout']);
    }

    public function adminloginpg(){
        return view('auth.admin_login');
    }

    //login into admin page 
    public function adminlogin(Request $r){
     $this->validate($r,[
            'username' => 'required',
            'password' => 'required'
        ]);
     
      if (Auth::guard('admin')->attempt(['username'=> $r->username, 'password' => $r->password])) {

          return redirect()->intended(route('dashboard'));
      }
        
       
      return redirect()->back()->withInput($r->only('username'))->with('error','Invalid Credentials');

    }
    public function adminlogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('adlogin');
    }
}
