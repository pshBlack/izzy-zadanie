<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = [
        'name',
        'serial_number',
        'car_id'
    ];
    public function car() {
        return $this->belongsTo(Car::class);
    }
}
