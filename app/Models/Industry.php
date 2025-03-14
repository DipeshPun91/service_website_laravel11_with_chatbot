<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $table = 'industries';

    protected $fillable = [
        'industry',
    ];

    /**
     * Define a one-to-many relationship with the Solution model.
     */
    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }
}
