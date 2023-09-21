<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    //para indicar que 1 rol tiene muchos usuarios
    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
