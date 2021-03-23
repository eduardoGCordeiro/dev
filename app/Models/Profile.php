<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'name',
        'office',
        'education_level_id',
        'email',
        'phone',
        'ip',
        'observation'
    ];

    public function educationLevel()
    {
        return $this->belongsTo('App\Models\EducationLevel');
    }

    public function file()
    {
        return $this->morphOne('App\Models\File', 'fileable');
    }
}
