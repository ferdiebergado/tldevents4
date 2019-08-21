<?php

namespace App;

use App\BaseModel;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;

class Region extends BaseModel
{
    use LaravelVueDatatableTrait;

    protected $dataTableColumns = [
        'id' => [
            'searchable' => false,
        ],
        'name' => [
            'searchable' => true,
        ],
        'area' => [
            'searchable' => false,
        ],
        'sequence' => [
            'searchable' => false,
        ],
        'active' => [
            'searchable' => false,
        ],
    ];

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }
}
