<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
                    // ->join('users as a','consultations.admin_id','=','a.id')
                    ->orderByDesc('consultations.created_at')
                    ->select('consultations.*',
                        'p.firstname as p_firstname',
                        'p.lastname as p_lastname',
                        // 'a.firstname as a_firstname',
                        // 'a.lastname as a_lastname',
                        's.name as subject_name'
                        )
                    ->get();
                    // dd($consultation);
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


    private function tienePermisos()
    {
        return Auth::user()->role_id == 1 || Auth::user()->role_id == 2;
    }


    public function index()
    {
        switch(Auth::user()->role->name)
        {
            case 'Admin':
                $consultations = $this->getConsultation();
                return view('consultation.admin-index',[
                    'consultations' => $consultations,

                ]);
                break;
            case 'Profesor':
                $teacher_id = Auth::user()->id;
                $consultations = $this->getConsultation()->where('teacher_id','=',$teacher_id);
                return view('consultation.profesor-index',[
                    'consultations' => $consultations,

                ]);
                break;
            default:
               return redirect('/');

        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if($this->tienePermisos())
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
        else
        {
            return redirect('/');
        }
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
            'subject_name' => 'required|min:1',
            'dayOfWeek' => 'required|min:2',
            'time' => 'required',
            'type' => 'required',
            'place' => '',
            'link' => ''
        ];


        if (Auth::user()->role_id == 1) {
            $consultationRequest = Arr::add($consultationRequest,'admin_id','required|min:1');
            $consultationRequest = Arr::add($consultationRequest,'teacher_legajo','required|min:1');
            $newConsultation = $request->validate($consultationRequest);
            $teacher = $this->getTeacherIDByLegajo($newConsultation['teacher_legajo']);
            $newConsultation =  Arr::add($newConsultation,'teacher_id',$teacher->first()->id);
            Arr::forget($newConsultation,'teacher_legajo');
        } else {
            $consultationRequest = Arr::add($consultationRequest,'teacher_id','required|min:1');
            $newConsultation = $request->validate($consultationRequest);
        }

        // dd($newConsultation);
       $subject =  $this->getSubject($newConsultation['subject_name']);
    //    dd($teacher->first());
       $newConsultation =  Arr::add($newConsultation,'subject_id',$subject->first()->id);


       Arr::forget($newConsultation,'subject_name');

    //    dd($newConsultation);
       Consultation::create($newConsultation);
        return redirect('/consultations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function darDeBaja($teacher_id)
    {
        Consultation::where('teacher_id','=',$teacher_id)
            ->update(['active'=>0]);

            return redirect('consultation');
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


        // if(Auth::user()->role->name =='Admin')
        // {
            // $teacher =

            $legajo = $consultation->teacher->legajo;
        // }

        // dd($consultation->subject->name);

        // $consultationSubject = $this->getSubject()->where('id','=',$consultation->subject_id);

        // dd($consultationSubject->first()->name);

        // $consultation = Arr::add($consultation,'subject_name', $consultationSubject->first()->name);
        $consultation = Arr::add($consultation,'subject_name', $consultation->subject->name);
        $consultation = Arr::add($consultation,'teacher_legajo', $legajo);
        //$consultation = Consultation::latest()->get()->where('id','=',$id);


        // dd(Auth::user()->role->name);


        return view('consultation.update', [

            'teachers' => $teachers,
            'subjects' => $subjects,
            'consultation' => $consultation,
            'legajo' => $legajo,
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
            'id' => 'required',
            // 'teacher_legajo' => 'required|min:1',
            'subject_name' => 'required|min:1',
            'dayOfWeek' => 'required|min:2',
            'time' => 'required|min:1',
            'type' => 'required',
            'place' => '',
            'link' => '',
            'active'=> '',
            'alternative' => ' ',
            'reasonCancel' =>''
        ];


        if (Auth::user()->role_id == 1) {
            $consultationRequest = Arr::add($consultationRequest,'admin_id','required|min:1');
            $consultationRequest = Arr::add($consultationRequest,'teacher_legajo','required|min:1');

            $newConsultation = request()->validate($consultationRequest);
            $teacher = $this->getTeacherIDByLegajo($newConsultation['teacher_legajo']);
            $newConsultation =  Arr::add($newConsultation,'teacher_id',$teacher->first()->id);
            Arr::forget($newConsultation,'teacher_legajo');

        } else {
            $consultationRequest = Arr::add($consultationRequest,'teacher_id','required|min:1');
            $newConsultation = request()->validate($consultationRequest);

        }
        $subject =  $this->getSubject($newConsultation['subject_name']);

        $newConsultation =  Arr::add($newConsultation,'subject_id',$subject->first()->id);
        Arr::forget($newConsultation,'subject_name');


        if(!empty(isset($newConsultation['reasonCancel'])))
        {
            $newConsultation =  Arr::add($newConsultation,'active',0);

            DB::table('reason_cancel')->insert([
                'reasonCancel' => $newConsultation['reasonCancel'],
                'consultation_id'=>$newConsultation['id'],
                'created_at'=> date('c')
            ]);


        }
        else
        {
            $newConsultation =  Arr::add($newConsultation,'active',1);
        }
        Arr::forget($newConsultation,'reasonCancel');

        // dd($newConsultation);
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
