<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class SearchConsultationController extends Controller
{
    public function show()
    {
        // dd(request('search'));
        $results = Consultation::get()->where('alternative',  request('search'));
        return view('consultation.search', [
            'consultations' => $results
        ]);
    }
}