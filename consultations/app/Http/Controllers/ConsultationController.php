<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Arr;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getConsultation()
    {
       
            $consultation = Consultation::
                      join('subjects as s','consultations.subject_id','=','s.id')
                    ->join('users as p','consultations.teacher_id','=','p.id')
                    ->join('users as a','consultations.admin_id','=','a.id')
                    ->orderByDesc('consultations.created_at')
                    ->select('consultations.*',
                        'p.firstname as p_firstname',
                        'p.lastname as p_lastname',
                        'a.firstname as a_firstname',
                        's.name as subject_name'
                        )
                    ->get();
       
            return $consultation;
       
    }

    private function getWeek()
    {
         
        return  ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
    }

    private function weekDayExists($day)
    {
        $Weekend = $this->getWeek();

        $filtered = Arr::where($Weekend, function ($value) {
            return $value == $day;
        });

        return empty($filtered);
    }

    private function getTeachers($id = Null)
    {
        if ($id != Null)
        {
            return User::latest()->get()->where('id', '=', $id)->limit(1);
        }
        else
        {
            return User::latest()->get()->where('role_id', '=', '2');
        }
    }

    private function getTeacherIDByLegajo($legajo)
    {
        return User::latest()->get()->where('legajo', '=', $legajo);
    }

    private function getSubject($name = Null)
    {
        if ($name != Null)
        {
            return Subject::latest()->get()->where('name', '=', $name);
        }
        else
        {
            return Subject::latest()->get();
        }
    }


    public function index()
    {
        if (Auth::user()->role_id == 1) {
            $consultations = $this->getConsultation();

        } else {
            $teacher_id = Auth::user()->id;
            $consultations = $this->getConsultation()->where('teacher_id','=',$teacher_id);
        }
      
         return view('consultation.index',[
            'consultations' => $consultations,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = $this->getTeachers(); 
        $subjects = $this->getSubject();
        $week =  $this->getWeek();
        // dd($week);
        return view('consultation.create', [

            'teachers' => $teachers,
            'subjects' => $subjects,
            'week' => $week
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consultationRequest = 
        [
            'teacher_legajo' => 'required|min:1',
            'subject_name' => 'required|min:1',
            'dayOfWeek' => 'required|min:2',
            'time' => 'required|min:1',
            'type' => 'required',
            'place' => '',
            'link' => ''
        ];
              

        if (Auth::user()->role_id == 1) {
            $consultationRequest = Arr::add($consultationRequest,'admin_id','required|min:1');

        } else {
            Arr::forget($consultationRequest,'teacher_legajo');
            $consultationRequest = Arr::add($consultationRequest,'teacher_id','required|min:1');
        }
       
       $newConsultation = $request->validate($consultationRequest);
      

       $teacher = $this->getTeacherIDByLegajo($newConsultation['teacher_legajo']);
       $subject =  $this->getSubject($newConsultation['subject_name']);
       
       $newConsultation =  Arr::add($newConsultation,'teacher_id',$teacher[0]->id);
      
       $newConsultation =  Arr::add($newConsultation,'subject_id',$subject[1]->id);
       
       Arr::forget($newConsultation,'teacher_legajo');
       Arr::forget($newConsultation,'subject_name');
         
    
        Consultation::create($newConsultation);
        return redirect('/consultations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Consultation $consultation)
    {
        $week = $this->getWeek();
        $teachers = $this->getTeachers();
        $subjects = $this->getSubject();

        $consultationSubject = $this->getSubject()->where('id','=',$consultation->subject_id);
        $consultation = Arr::add($consultation,'subject_name', $consultationSubject[1]->name);
  

        //$consultation = Consultation::latest()->get()->where('id','=',$id);

        return view('consultation.update', [

            'teachers' => $teachers,
            'subjects' => $subjects,
            'consultation' => $consultation,
            'week' => $week
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function save()
    {

        $consultationRequest = 
        [
            'teacher_legajo' => 'required|min:1',
            'subject_name' => 'required|min:1',
            'dayOfWeek' => 'required|min:2',
            'time' => 'required|min:1',
            'type' => 'required',
            'place' => '',
            'link' => '',
            'active'=> ' ',
            'reason_cancel' =>'required',
            'alternative' => 'required'
        ];
              

        if (Auth::user()->role_id == 1) {
            $consultationRequest = Arr::add($consultationRequest,'admin_id','required|min:1');

        } else {
            Arr::forget($consultationRequest,'teacher_legajo');
            $consultationRequest = Arr::add($consultationRequest,'teacher_id','required|min:1');
        }
 
        $newConsultation = request()
            ->validate($consultationRequest);
        dd($newConsultation);
        $newConsultation['active'] = ($newConsultation['active'] == "Activada")? 1 : 0;
        $teacher = $this->getTeacherIDByLegajo($newConsultation['teacher_legajo']);
        $subject =  $this->getSubject($newConsultation['subject_name']);
        
        $newConsultation =  Arr::add($newConsultation,'teacher_id',$teacher[0]->id);
       
        $newConsultation =  Arr::add($newConsultation,'subject_id',$subject[1]->id);
        
        Arr::forget($newConsultation,'teacher_legajo');
        Arr::forget($newConsultation,'subject_name');

        Consultation::where('id', '=', $newConsultation['id'])->update($newConsultation);
        return redirect('/consultations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Consultation::where('id', '=', $id)->delete();
        return redirect('/consultations');
    }
 
}
