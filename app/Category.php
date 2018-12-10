<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $fillable=['name'];

    public function name(){
        return $this->attributes['name'];
    }

    public function movement(){
        return $this->hasMany(Movement::class);
    }
}
