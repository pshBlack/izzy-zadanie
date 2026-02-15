<?php

namespace App\Filters;
class PartFilter extends QueryFilter {

    public function search($value) {

        $this->builder->where('name', 'like',"%{$value}%");
    }
    public function part_id($value) {
        $this->builder->where('id', $value);
    }
    public function sort($value) {
        $direction = $this->request->query('direction', 'asc');
        $sortable = ['id','name', 'serialnumber','car_id','created_at'];

        if(in_array($value, $sortable)) {
            $this->builder->orderBy($value, $direction);
        }

    }
}