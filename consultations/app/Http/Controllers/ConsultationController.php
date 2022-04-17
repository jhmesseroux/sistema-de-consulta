<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $teachers = User::latest()->get()->where('role_id','=','2');
        $subjects = Subject::latest()->get();


        return view('consultation.create',[

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
    public function store()
    {
        $newConsultation = request()->validate(
            [
                'teacher_id' => 'required|min:1|unique:consultations,teacher_id',
                'subject_id' => 'required|min:1|unique:consultations,subject_id',
                'dayOfWeek'=>'required|min:2',
                'time' => 'required|min:1',
                'type' => 'required'


            ]
        );

        Consultation::create($newConsultation);
        return redirect('consultation.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
