<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $table = 'solutions';

    protected $fillable = [
        'title',
        'description',
        'industry_id',
    ];

    /**
     * Define an inverse one-to-many relationship with the Industry model.
     */
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }
}
