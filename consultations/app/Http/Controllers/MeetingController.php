<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Mail\ConsultationUser;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MeetingController extends Controller
{
    public function save()
    {
        if (Auth::check()) {
            // dd(request()->all());
            $attr = request()->validate([
                'comment' => 'required|max:100',
                'consultation_id' => ' required',

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

    public function information($id)
    {
        
        $consultation = Consultation::
        join('subjects as s','consultations.subject_id','=','s.id')
      ->join('users as p','consultations.teacher_id','=','p.id')
      ->orderByDesc('consultations.created_at')
      ->where('consultations.id','=',$id) 
      ->get();
        $inscriptions = Meeting::latest()
            ->join('consultation as c','c.id','=','consultation_id')       
                                                        ## ME QUEDE ACA 
                                                        ## TENGO QUE TRAER A TODOS LOS ALUMNOS DE LA CONSULTA
            ->join('users as a','p.id','=','alumn_id')
            ->where('consultation_id','=',$id);
        
        
        return view('consultation.inscriptos',[
            "meetings"=>$inscriptions,
            "consultations"=>$consultation
        ]);
    }
}
