<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::latest()->paginate(10);

        return view('subject.index', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newSubject = request()->validate([
            'name' => 'required|min:3|unique:subjects,name'
        ]);

        Subject::create($newSubject);
        return redirect()->route('admin.subjects')->with('success', 'Materia guardada con exito!');
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
    public function update(Subject $subject)
    {
        return view('subject.update', [
            'subject' => $subject
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
        $subject = request()->validate([
            'name' => 'required|min:3|unique:subjects,name',
            'id' => ''
        ]);

        Subject::where('id', $subject['id'])
            ->update($subject);
       return redirect()->route('admin.subjects')->with('success', 'Materia guardada con exito!');
    }
    public function delete(Subject $subject)
    {
       $subject->delete();
        return redirect()->route('admin.subjects')->with('success', 'Materia borrada con exito!');
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