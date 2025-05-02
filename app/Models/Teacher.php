<?php

namespace App\Models;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Get the students assigned to the teacher.
     */
    public function students() {
        return $this->hasMany(Student::class, 'class_teacher_id');
    }
}
