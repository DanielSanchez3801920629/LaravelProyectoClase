<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['grade_name', 'grade_value_percentage', 'grade_deadline'];

    public function students(){
        return $this->belongsToMany(Student::class)->withPivot(['id', 'grade_value']);
    }
}
