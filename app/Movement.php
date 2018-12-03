<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table='movements';
    protected $fillable=[
        'movement_date',
        'type',
        'description',
        'money'
    ];

    protected $dates=['movement_date'];

     public function getMoneyDecimalAttribute(){
        return $this->attributes['money']/100;
    }
        public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
