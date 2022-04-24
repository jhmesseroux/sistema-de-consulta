<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    // protected $fillable =
    // [
    //     'teacher_id',
    //     'subject_id',
    //     'dayOfWeek',
    //     'time',
    //     'type'
    // ];
    protected $guarded = [];

    public function teacher()
    {
        return Consultation::belongsTo(User::class, 'teacher_id');
    }
}