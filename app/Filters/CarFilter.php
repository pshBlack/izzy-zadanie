<?php

namespace App\Filters;
class CarFilter extends QueryFilter{

    public function search($value) {
        if($value == null || $value == "") {
            return;
        }
        $this->builder->where('name', 'like',"%{$value}%");
    }
    public function car_id($value) {
        $this->builder->where('id', $value);
    }
    public function sort($value) {
        $direction = $this->request->query('direction', 'asc');
        $sortable = ['id', 'name','is_registered', 'parts_count','created_at'];

        if(in_array($value, $sortable)) {
            $this->builder->orderBy($value, $direction);
        }

    }
}