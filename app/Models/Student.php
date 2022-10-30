<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
                            'name','age','gender','reporting_teacher'
                          ];
    public function getName($id)
    {
      $student = Student::find($id);
      return $student->name;
    }


}
