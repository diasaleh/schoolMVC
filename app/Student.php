<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['id','person_id','transMorning','transAfternoon','regestrationDate','numberBrothers',
    'numberSister','numberPartMemorize','diseases','surgaries'];
    //
    public function klass(){
        return $this->hasOne('App\Classes');
    }
}
