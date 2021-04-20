<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role_id == 1){
          return  redirect('/patient/dashboard');
        }else if (auth()->user()->role_id == 2){
           return  redirect('/medecine/dashboard');
        }else {
            return redirect('/admin/dashboard');
        }

    }
}
