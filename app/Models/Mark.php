<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $table = 'mark_entry';

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
