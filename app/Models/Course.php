<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    /**
     * Get all of the admissions for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function admissions(): HasMany
    {
        return $this->hasMany(Admission::class);
    }
    
}
