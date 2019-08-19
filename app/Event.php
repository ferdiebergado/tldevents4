<?php

namespace App;

use App\Http\BaseModel;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;

// use Illuminate\Database\Eloquent\Model;

class Event extends BaseModel
{
    use LaravelVueDatatableTrait;

    protected $fillable = [
        'title',
        'venue',
        'start_date',
        'end_date'
    ];

    protected $dataTableColumns = [
        'id' => [
            'searchable' => false,
        ],
        'title' => [
            'searchable' => true,
        ],
        'venue' => [
            'searchable' => true,
        ],
        'start_date' => [
            'searchable' => false
        ],
        'end_date' => [
            'searchable' => false
        ]
    ];
}
