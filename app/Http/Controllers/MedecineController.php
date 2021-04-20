<?php


namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MedecineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->role_id == 1){
            return redirect('/patient/dashboard');
        }
        return view('medecine.index');
    }

    public function patient()
    {

        $patient =DB::table('users')->where('role_id',1)->get();

        $events = DB::table('events')->get();

        $patientList = [];

        foreach ($patient as $item) {
            foreach ($events as $event) {
                if (auth()->user()->id = $event->client_id){
                    if (!in_array($item,$patientList)){
                        array_push($patientList,$item);
                    }
                }
            }
        }

         return view('medecine.patients',compact("patientList"));
    }

    public function apointment()
    {
        $apointments = DB::table('events')
                       ->join('users','users.id','=','events.client_id')
                        ->where('events.doctor_id',auth()->user()->id)
            ->where('events.statut','!=',"3")
            ->where('events.statut','!=',"4")
            ->select("events.*","users.*","events.statut AS eventStatut",'events.id As eventId')
                       ->get();
         return view('medecine.apointment',compact("apointments"));
    }

    public function historic()
    {
        $apointments = DB::table('events')
                       ->join('users','users.id','=','events.client_id')
                        ->where('events.doctor_id',auth()->user()->id)
            ->where('events.statut','!=',"1")
            ->where('events.statut','!=',"2")
            ->select("events.*","users.*","events.statut AS eventStatut")
                       ->get();
         return view('medecine.historic',compact("apointments"));
    }

    public function calendar()
    {
        $apointments = DB::table('events')
            ->join('users','users.id','=','events.client_id')
            ->where('events.doctor_id',auth()->user()->id)
            ->where('events.statut','!=',"3")
            ->select("events.*","users.*","events.statut AS eventStatut")
            ->get();

        $patient =DB::table('users')->where('role_id',1)->get();

        $events = DB::table('events')->get();

        $patientList = [];

        foreach ($patient as $item) {
            foreach ($events as $event) {
                  if ($item->id = $event->client_id){
                     if (!in_array($item,$patientList)){
                         array_push($patientList,$item);
                     }
                  }
            }
        }


        return view('medecine.calendar',compact('apointments','patientList'));
    }


    public function actionapointment($type,$id)
    {
        if (DB::table('events')->where('id',$id)->update(['statut' => $type])){
            echo 'true';
        }else{
            echo "false";
        }
    }


}