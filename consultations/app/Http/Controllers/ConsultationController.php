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
        return Consultation::
                  join('subjects','consultations.subject_id','=','subjects.id')
                ->join('users','consultations.teacher_id','=','users.id')
                ->orderByDesc('consultations.created_at')
                ->get();
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

    private function getTeachers()
    {
        return User::latest()->get()->where('role_id', '=', '2');
    }

    private function getSubject()
    {
        return Subject::latest()->get();
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
            'consultations' => $consultations
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
        $week = $this->getWeek();

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
            $consultationRequest = Arr::add($consultationRequest,'admin_id','' );

            $newConsultation = $request->validate($consultationRequest);
        } else {
            Arr::forget($consultationRequest,'teacher_legajo');
            $consultationRequest = Arr::add($consultationRequest,'teacher_legajo','' );
            $newConsultation = $request->validate($consultationRequest);
        }

        $newConsultation['teacher_id'] = Auth::user()->id;



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
        $teachers = $this->getTeachers();
        $subjects = $this->getSubject();

        //$consultation = Consultation::latest()->get()->where('id','=',$id);

        return view('consultation.update', [

            'teachers' => $teachers,
            'subjects' => $subjects,
            'consultation' => $consultation
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function save()
    {
        $newConsultation = request()->validate(
            [

                'dayOfWeek' => 'required|min:2',
                'admin_id' => '',
                'subject_id' => 'required|min:1',
                'dayOfWeek'=>'required|min:2',
                'time' => 'required|min:1',
                'type' => 'required',
                'id' => '',
                'place' => '',
                'link' => '',
                'active'=>'',
                'reasonCancel'=>''
            ]
        );

        $newConsultation['active'] = ($newConsultation['active'] == "Activada")? 1 : 0;

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
