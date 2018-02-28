<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded=[];
    protected $table='books';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
