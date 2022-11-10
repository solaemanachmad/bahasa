<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldCertificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
        'name',
        'semester',
        'score'
    ];
}
