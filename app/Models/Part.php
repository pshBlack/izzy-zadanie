<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Part extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'serial_number',
        'car_id'
    ];
    public function car() {
        return $this->belongsTo(Car::class);
    }
}
