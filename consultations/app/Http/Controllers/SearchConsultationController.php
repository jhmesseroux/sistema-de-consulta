<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchConsultationController extends Controller
{
    public function show()
    {
        // var_dump(strtolower(request('search')));
        $results = DB::table('consultations')
            ->join('subjects', 'subjects.id', '=', 'consultations.subject_id')
            ->join('users', 'users.id', '=', 'consultations.teacher_id')
            ->where('subjects.name', 'like',  '%' .  strtolower(request('search')) . '%')->orWhere('users.firstname', 'like',  '%' .  strtolower(request('search')) . '%')->orWhere('users.lastname', 'like',  '%' .  strtolower(request('search')) . '%')
            ->select('consultations.*', 'users.firstname', 'users.lastname', 'users.email', 'users.avatar', 'subjects.name')
            ->paginate(10);
        // var_dump(strtolower(request('search')));

        // $r = DB::table('subjects')->join('consultations', function ($join) {
        //     $join->on('subjects.id', '=', 'consultations.subject_id')->where('subjects.name', '=', 'voluptatem');
        // })->join('users', function ($join) {
        //     $join->on('users.id', '=', 'consultations.teacher_id')->where('users.firstname', '=', 'Danial');
        // })->get();
        // $r = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id')->select('*')->get();
        // $r = DB::table('users')->crossJoin('roles')->get();

        // dd($r);
        // $results = Consultation::where('alternative', 'like',  '%' . request('search') . '%')->get();
        return view('consultation.search', [
            'consultations' => $results
        ]);
    }
}
