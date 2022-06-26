<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonCancel extends Model
{
    use HasFactory;

    protected $fillable = ['reasonCancel','conmsultation_id'];

    public function consultation()
    {
        return ReasonCancel::belongsTo(Consultation::class, 'consultation_id');
    }
}
