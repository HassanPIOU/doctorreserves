<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{

    public function index()
    {
         return view('setting.index');
    }

    public function payed()
    {
        if (DB::table('users')->where('id',auth()->user()->id)->update(['plan_id' => 2])){
            echo "true";
        }else{
            echo 'false';
        }
    }
}