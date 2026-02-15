<?php

namespace App\Models;

use App\Filters\CarFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
class Car extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'registration_number',
        'is_registered'
    ];

    public function scopeFilter(Builder $builder, CarFilter $filter) {
        return $filter->apply($builder);
    }

    public function parts() {
        return $this->hasMany(Part::class);
    }
}
