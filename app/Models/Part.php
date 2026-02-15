<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\PartFilter;


class Part extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'serialnumber',
        'car_id'
    ];

    public function scopeFilter(Builder $builder, PartFilter $filter) {
        return $filter->apply($builder);
    }
    public function car() {
        return $this->belongsTo(Car::class);
    }
}
