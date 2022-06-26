<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class SearchConsultationController extends Controller
{


    private function traducirDia($dia)
    {
        $dias =
        [
            "Lunes"=>"Monday",
            "Martes"=>"Tuesday",
            "Miercoles"=>"Wednesday",
            "Miércoles"=>"Wednesday",
            "Jueves"=>"Thursday",
            "Viernes"=>"Friday"
        ];

        return $dias[$dia];
    }

    private function devolverDiaDeConsulta($diaDeLaSemana)
    {

        $date = new DateTime();
        $date = $date->format('Y-m-d');
        // $input = "2022-06-06";
        $date = date_create($date);
        $dayOfWeek= $this->traducirDia($diaDeLaSemana);
        $bandera = 1;
        $diaDeConsulta = Null;
        while($bandera <= 7)
        {
            date_add($date,date_interval_create_from_date_string("1 days"));
            $format =  $date->format('Y-m-d');
                $dia = date_parse($format)['day'];
                $mes = date_parse($format)['month'];
                $year = date_parse($format)['year'];

            $jd=gregoriantojd($mes,$dia,$year);
            $diaDeSemana = jddayofweek($jd,1);

            if($diaDeSemana == $dayOfWeek)
            {
            $diaDeConsulta = $date;
            break;

            }
            else
            {
            $bandera++;
            }


        }
        return $diaDeConsulta;
    }

    public function show()
    {
        $results = DB::table('consultations')
            ->join('subjects', 'subjects.id', '=', 'consultations.subject_id')
            ->join('users', 'users.id', '=', 'consultations.teacher_id')
            ->where('subjects.name', 'like',  '%' .  strtolower(request('search')) . '%')->orWhere('users.firstname', 'like',  '%' .  strtolower(request('search')) . '%')->orWhere('users.lastname', 'like',  '%' .  strtolower(request('search')) . '%')
            ->select('consultations.*', 'users.firstname', 'users.lastname', 'users.email', 'users.avatar', 'subjects.name')
            ->paginate(10);

        foreach($results as $row)
        {
            $diaDeConsulta = $this->devolverDiaDeConsulta($row->dayOfWeek)->format('d-m');
            $hora = strtotime($row->time);
            $hora = date('H:i ',$hora);
            $row->time = $hora;
            $row->diaDeConsulta = $diaDeConsulta;
            $row->dateConsultation = $this->devolverDiaDeConsulta($row->dayOfWeek)->format('Y-m-d');

        }

        return view('consultation.search', [
            'consultations' => $results
        ]);
    }
}
