<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [

        'first_name',
        'last_name',
        'other_names',
        'gender',
        'dob',
        'email',
        'nationality',
        'phone_number',
        'state_of_origin',
        'lga',
        'clan',
        'family_name',
        'nin',
        'passport_path',
        'user_id'
    ];
}
