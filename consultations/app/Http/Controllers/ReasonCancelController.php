<?php

namespace App\Http\Controllers;

use App\Models\ReasonCancel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReasonCancelController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $consultasCanceladas = DB::table('reason_cancel as rc')
            ->join('consultations as c', 'c.id', '=', 'rc.consultation_id')
            ->join('users as t', 't.id', '=', 'c.teacher_id')
            ->select('t.firstname', 't.lastname', 'c.teacher_id', 'c.id', 't.avatar')
            ->groupBy('t.firstname', 't.lastname', 'c.teacher_id', 'c.id', 't.avatar')
            ->get();

        foreach ($consultasCanceladas as $consulta) {
            $cantidad = DB::table('reason_cancel as rc')
                ->join('consultations as c', 'c.id', '=', 'rc.consultation_id')
                ->where('c.teacher_id', '=', $consulta->teacher_id)
                ->count();

            $ultimaFechaDeConsultaCancelada = DB::table('reason_cancel as rc')
                ->join('consultations as c', 'c.id', '=', 'rc.consultation_id')
                ->join('users as t', 't.id', '=', 'c.teacher_id')
                ->where('c.teacher_id', '=', $consulta->teacher_id)
                ->groupBy('t.id')
                ->max('rc.created_at');
            $consulta->cantidad = $cantidad;
            $consulta->diaCancelado = $ultimaFechaDeConsultaCancelada;
            // dd($ultimaFechaDeConsultaCancelada);
        }


        return view('reasonCancel.index', [
            'consultasCanceladas' => $consultasCanceladas
        ]);
    }
    public function show($id)
    {
        $consultasCanceladas = DB::table('reason_cancel as rc')
            ->join('consultations as c', 'c.id', '=', 'rc.consultation_id')
            ->join('users as t', 't.id', '=', 'c.teacher_id')
            ->join('subjects as s', 's.id', '=', 'c.subject_id')
            ->select(
                't.firstname',
                't.lastname',
                'c.teacher_id',
                't.avatar',
                't.email',
                'c.id',
                'c.dayOfWeek',
                'c.time',
                'c.place',
                'c.link',
                's.name'
            )
            ->distinct()
            ->where('t.id', '=', $id)
            ->get();

        $profesor = [
            'firstname' => '',
            'lastname' => '',
            'email' => '',
            'avatar' => ''
        ];

        foreach ($consultasCanceladas as $consulta) {
            $razones = DB::table('reason_cancel as rc')
                ->join('consultations as c', 'c.id', '=', 'rc.consultation_id')
                ->where('c.id', '=', $consulta->id)
                ->select('rc.reasonCancel', 'rc.created_at')
                ->orderByDesc('rc.created_at')
                ->get();

            $consulta->razones = $razones;
            $profesor['firstname'] = $consulta->firstname;
            $profesor['lastname'] = $consulta->lastname;
            $profesor['email'] = $consulta->email;
            $profesor['avatar'] = $consulta->avatar;
        }



        return view('reasonCancel.information', [
            'consultas' => $consultasCanceladas,
            'profesor' => $profesor
        ]);
    }
}