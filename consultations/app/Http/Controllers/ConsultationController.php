<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 1) {
            $consultations = Consultation::latest()->get();
        } else {
            $teacher_id = Auth::user()->id;
            $consultations = Consultation::latest()->get()->where('teacher_id','=',$teacher_id);
        }

        $consultations = Consultation::latest()->get();
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
        $teachers = User::latest()->get()->where('role_id', '=', '2');

        $teachers = User::latest()->get()->where('role_id','=','2');
        $subjects = Subject::latest()->get();


        return view('consultation.create', [

            'teachers' => $teachers,
            'subjects' => $subjects
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
        $newConsultation = $request->validate(
            [
                'teacher_id' => 'required|min:1|unique:consultations,teacher_id',
                'subject_id' => 'required|min:1|unique:consultations,subject_id',
                'dayOfWeek' => 'required|min:2',
                'time' => 'required|min:1',
                'type' => 'required',
                'place' => '',
                'link' => ''
            ]
        );
        if (Auth::user()->role_id == 1) {
            $newConsultation = $request->validate(
                [
                    'teacher_id' => 'required|min:1|unique:consultations,teacher_id',
                    'subject_id' => 'required|min:1|unique:consultations,subject_id',
                    'dayOfWeek'=>'required|min:2',
                    'time' => 'required|min:1',
                    'type' => 'required',
                    'place' => '',
                    'link' => '',
                    'admin_id' => ''

                ]
            );
        } else {
            $newConsultation = $request->validate(
                [
                    'teacher_id'=>'',
                    'subject_id' => 'required|min:1|unique:consultations,subject_id',
                    'dayOfWeek'=>'required|min:2',
                    'time' => 'required|min:1',
                    'type' => 'required',
                    'place' => '',
                    'link' => '',
                    'admin_id' => ''
                ]
            );
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
        $teachers = User::latest()->get()->where('role_id', '=', '2');
        $subjects = Subject::latest()->get();

        //$consultation = Consultation::latest()->get()->where('id','=',$id);

        return view('consultation.update', [

            'teachers' => $teachers,
            'subjects' => $subjects,
            'consultation' => $consultation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
