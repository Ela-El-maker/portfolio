<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterInfoContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'phone',
        'email'
    ];
}
