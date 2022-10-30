<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
  use HasFactory;

  protected $table = 'marks';
  protected $fillable = [
    'student_id', 'term_id', 'maths', 'science', 'history', 'total'
  ];

  public function getTerm($id)
  {
    if($id == '1'){
      $term = 'Term 1';
    }
    else{
      $term = 'Term 2';
    }
    return $term;
  }
}
