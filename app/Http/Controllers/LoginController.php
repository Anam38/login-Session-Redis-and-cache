<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use App\user as User;

class LoginController extends Controller
{
  public function index()
  {
    //cache
    if (Cache::has('login')) {
      return view('home');
    }else {
      return view('login')->with('alert','anda belum login');
    }

    // Session
    // if (Session::get('login')) {
    //   return view('home');
    // }else {
    //   return view('login')->with('alert','anda belum login');
    // }
  }

  public function login(Request $request)
  {
      $email = $request->email;
      $pass = $request->password;

      $check = User::where('email',$email)->first();
      if ($check) {
        if (Hash::check($pass,$check->password)) {

          // Cache
          Cache::put('name',$check->name,10);
          Cache::put('email',$check->email,10);
          Cache::put('login',TRUE,10);

          // Session
          // Session::put('name',$check->name);
          // Session::put('email',$check->email);
          // Session::put('login',TRUE);
          return view('home');
        }else {
          // code...
          return redirect('/')->with('alert','Password atau Email, Salah !'.Hash::check($pass,$check->password));
        }
      }else {
        return redirect('/')->with('alert','Email atau password anda salah');
      }

  }

  public function register()
  {
    return view('register');
  }

  public function registerchek(Request $request)
  {
    User::create([
      'name'      => $request->name,
      'email'     => $request->email,
      'password'  => bcrypt($request->password)
    ]);
    return redirect('/');
  }

  public function logout()
  {
      Cache::flush();

      //Session::flush();
      return redirect('/')->with('alert','Kamu sudah logout');
  }

  public function home()
  {
    if (Cache::has('login')) {
      return view('home');
    }else {
      return view('login')->with('alert','anda belum login');
    }


    // if (Session::get('login')) {
    //   return view('home');
    // }else {
    //   return view('login')->with('alert','anda belum login');
    // }
  }
}
