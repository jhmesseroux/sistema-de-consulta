<?php

namespace App\Http\Controllers;

use App\Mail\ConsultationUser;
use App\Models\Meeting;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Null_;
use PhpOption\None;

class MeetingController extends Controller
{
    public function save()
    {
        if (Auth::check()) {
            // dd(request()->all());
            $attr = request()->validate([
                'comment' => 'required|max:100',
                'consultation_id' => ' required'

            ]);
            $attr['user_id'] =  Auth::id();
            $meet = Meeting::create($attr);
            // dd($meet->user);
            Mail::to(Auth::user()->email)->send(new ConsultationUser($meet));
            return redirect('meeting/user');
            // ddd($attr);
        } else {
            ddd('error');
        }
    }
    public function index()
    {
        return view('meeting.index ', [
            'meeting' => Meeting::latest()->where('user_id', Auth::id())->get()
        ]);
    }


    // valida si corresponde mostrarle la informacion de la consulta o no
    // es decir si el usuario es el profesor
    public function esElUsuario($id)
    {
        ## ME QUEDE ACA
        ## TENGO QUE DEVOLVER EL ID DEL PROFESOR PARA COMPRAR CON EL ID DEL USUARIO:
        $resultado =  DB::table('consultations')
        ->where('consultations.id','=',$id)
        ->select('consultations.teacher_id')
        // ->limit(1)
        ->get()
        ;

        // dd($resultado->first()->teacher_id);

        return $resultado->first()->teacher_id == Auth::id() || Auth::user()->role_id == 1 ;
    }

    public function information($id)
    {


        if($this->esElUsuario($id))
        {



        $fechaDeHoy = new DateTime();
        $fechaProximaSemana = new DateTime();
        date_add($fechaProximaSemana,date_interval_create_from_date_string('7 days'));
        $fechaDeHoy = $fechaDeHoy->format('Y-m-d');
        $fechaProximaSemana = $fechaProximaSemana->format('Y-m-d');

        // dd($fechaProximaSemana);

        $inscriptions = DB::table('meetings')
            ->distinct()
            ->join('consultations','consultations.id','=','meetings.consultation_id')
            ->join('users', 'users.id', '=', 'meetings.user_id')
            ->select(  'users.firstname', 'users.lastname', 'users.email', 'users.avatar','meetings.id','meetings.comment' )
            ->where('consultation_id','=',$id)
            ->where('meetings.dateConsultation','>=',$fechaDeHoy)
            ->where('meetings.dateConsultation','<',$fechaProximaSemana)
            ->paginate(10);

        $cantidad = Meeting::
            where('meetings.dateConsultation','>=',$fechaDeHoy)
            ->where('meetings.dateConsultation','<',$fechaProximaSemana)
            ->count();

        $consultation = DB::table('consultations')
            ->join('subjects as s','consultations.subject_id','=','s.id')
            ->join('users as p','consultations.teacher_id','=','p.id')
            ->orderByDesc('consultations.created_at')
            ->select('consultations.*',
                'p.firstname','p.avatar', 'p.lastname','p.email',
                's.name')
            ->where('consultations.id','=',$id)
            ->paginate(10);
            ;

        return view('consultation.inscriptos',[
            "meetings"=>$inscriptions,
            "consultations"=>$consultation,
            "cantidad"=>$cantidad
        ]);
    }
    else
    {
        redirect()->back();
    }

}
}
