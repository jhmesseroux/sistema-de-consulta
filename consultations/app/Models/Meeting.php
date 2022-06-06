<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    // default value 
    protected $attributes = [
        'dateTimeCancelled' => null,
    ];

    public function consultation()
    {
        return Meeting::belongsTo(Consultation::class);
    }
    public function user()
    {
        return Meeting::belongsTo(User::class);
    }
}
