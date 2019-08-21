<?php

namespace App;

use App\Region;
use App\BaseModel;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;

class Division extends BaseModel
{
    use LaravelVueDatatableTrait;

    protected $dataTableColumns = [
        'id' => [
            'searchable' => false
        ],
        'name' => [
            'searchable' => true
        ],
        'region_id' => [
            'searchable' => false
        ],
        'active' => [
            'searchable' => false
        ]
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
