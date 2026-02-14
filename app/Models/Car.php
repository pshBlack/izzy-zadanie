<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'registration_number',
        'is_registered'
    ];
    public function parts() {
        return $this->hasMany(Part::class);
    }
}
