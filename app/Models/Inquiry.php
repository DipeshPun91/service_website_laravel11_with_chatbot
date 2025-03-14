<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inquiry extends Model
{
    use HasFactory;

    protected $table = 'inquiries';

    protected $fillable = [ 
        'name', 
        'email', 
        'phone', 
        'company_name', 
        'country', 
        'job_title', 
        'job_details', 
    ];
}
