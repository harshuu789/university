<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'student_name',
        'class_teacher_id',
        'class',
        'admission_date',
        'yearly_fees',
    ];

    protected $dates = [
        'admission_date',
        'deleted_at',
    ];

    /**
     * Get the class teacher associated with the student.
     */
    public function teacher() {
        return $this->belongsTo(Teacher::class, 'class_teacher_id');
    }
}
