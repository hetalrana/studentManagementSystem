<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'image',
        'gender',
        'mobileno',
        'address',
        'dateofbirth',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
