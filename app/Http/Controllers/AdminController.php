<?php
/**
 * Created by PhpStorm.
 * User: Stephane de Jesus
 * Date: 02/04/2021
 * Time: 06:23
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function entreprise(){
        $entreprises = DB::table('entreprises')->get();
        return view('admin.entreprise',compact('entreprises'));
    }
    public function service(){
        $services = DB::table('services')->join('entreprises','entreprises.id','services.entreprise_id')
            ->select('services.*','entreprises.name')->get();
        $entreprises = DB::table('entreprises')->where('statut',1)->get();
        return view('admin.service',compact('services','entreprises'));
    }
    public function medecine(){
        $medecines = DB::table('users')->where('role_id',2)->get();
        return view('admin.medecine',compact('medecines'));
    }
    public function patient(){
        $patientList = DB::table('users')->where('role_id',1)->get();
        return view('admin.patient',compact('patientList'));
    }
    public function payment(){
        $payment = DB::table('users')->where('plan_id',2)->get();
        return view('admin.payment',compact('payment'));
    }


    public function entrepriseAction($type,$id)
    {
        if ($type == 3){
            if (DB::table('entreprises')->where('id',$id)->delete()){
                echo 'true';
            }else{
                echo "false";
            }
        }else{
            if (DB::table('entreprises')->where('id',$id)->update(['statut' => $type])){
                echo 'true';
            }else{
                echo "false";
            }
        }
    }
    public function serviceAction($type,$id)
    {
        if ($type == 3){
            if (DB::table('services')->where('id',$id)->delete()){
                echo 'true';
            }else{
                echo "false";
            }
        }else{
            if (DB::table('services')->where('id',$id)->update(['statut' => $type])){
                echo 'true';
            }else{
                echo "false";
            }
        }
    }

    public function addservice(Request $request)
    {
        if (DB::table('services')->where([
                'poste'=>$request->input('poste'),
                'entreprise_id'=>$request->input('entreprise_id'),
            ])->count() > 0){
            echo "exist";
        }else{
           if ( DB::table('services')->insert($request->all())){
               echo "true";
           }else{
               echo "false";
           }
        }
    }
    public function addentreprise(Request $request)
    {
        if (DB::table('entreprises')->where('name',$request->input('name'))->count() > 0){
            echo "exist";
        }else{
           if ( DB::table('entreprises')->insert($request->all())){
               echo "true";
           }else{
               echo "false";
           }
        }
    }

    public function account()
    {
        return view('setting.profil');
    }

    public function accountupdate(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        if (DB::table('users')->where('id',auth()->user()->id)->update([
            'name' => $name,
            'email' => $email
        ])){
            return redirect()->back()->with('success','Modifier avec succes');
        }else{
            return redirect()->back()->with('error','Aucune modification apportée');
        }
    }

    public function updateUserProfil(Request $request)
    {
        $path = public_path("/uploads/avatar");
        if (!file_exists($path)){
            mkdir($path,777,true);
        }
        $filename = "";
        if ($request->hasFile('avatar')) {
            $file = request()->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
        }

        if (DB::table('users')->where('id',auth()->user()->id)->update([
            'avatar' => $filename,
        ])){
            echo 'true';
        }else{
            echo "false";
        }
    }
}