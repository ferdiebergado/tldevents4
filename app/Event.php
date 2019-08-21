<?php

namespace App;

use App\BaseModel;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;

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

    /**
     * Get the participants who attended the event.
     *
     * @return mixed
     */
    public function participants()
    {
        return $this->belongsToMany(Participant::class)->withPivot('mobile', 'email')->withTimestamps()->orderBy('lastname')->orderBy('firstname');
    }
}
