<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class SearchConsultationController extends Controller
{
    public function show()
    {
        // dd(request('search'));
        $results = Consultation::where('alternative', 'like',  '%' . request('search') . '%')->get();
        return view('consultation.search', [
            'consultations' => $results
        ]);
    }
}