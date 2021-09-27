<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts =[
        'plataforma' => 'array'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
