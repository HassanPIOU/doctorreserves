<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hospital = DB::table('entreprises')->where('statut',1)->get();
        $apointment = DB::table('events')
        ->join('users','users.id','events.doctor_id')
        ->join('services','users.service_id','services.id')
            ->where([
                'events.client_id' => auth()->user()->id,
            ])
             ->select("events.*","services.*","users.*","events.statut AS eventStatut")
            ->get();

        return view('patient.index',compact('hospital','apointment'));
    }

    public function departement(Request $request)
    {
        $id = $request->input('value');
        $dep = DB::table('services')->where('entreprise_id',$id)->get();
        $count = DB::table('services')->where('entreprise_id',$id)->count();
        if ($count == 0){
            echo "false";
        }else{
            return json_encode($dep);
        }

    }

    public function doctors(Request $request)
    {
        $id = $request->input('value');
        $dep = DB::table('users')->where('service_id',$id)->get();
        $count = DB::table('users')->where('service_id',$id)->count();
        if ($count == 0){
            echo "false";
        }else{
            return json_encode($dep);
        }

    }

    public function addApointment(Request $request)
    {
         if (DB::table('events')->insert($request->all())){
             echo "true";
         }else{
             echo "false";
         }
    }

    public function updateprofil(Request $request)
    {
         if(DB::table('users')->where('id',auth()->user()->id)->update($request->all())){
             echo "true";
         }else{
             echo  "false";
         }
    }

    public function updateprofilpicture(Request $request)
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