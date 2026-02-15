<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilter {
    public $request;
    public $builder;
    protected $delimeter = ',';

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function filters() {
        return $this->request->query();
    }

    public function apply(Builder $builder) {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if(!method_exists($this, $name)) {
                continue;
            }
            if($value == null || $value == '') {
                continue;
            }
            $this->$name($value);
        }
        return $this->builder;
    }

    protected function paramToArray($param) {
        return explode($this->delimeter, $param);
    }
}