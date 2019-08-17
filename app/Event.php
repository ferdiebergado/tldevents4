<?php

namespace App;

use App\Http\BaseModel;
// use Illuminate\Database\Eloquent\Model;

class Event extends BaseModel
{
    protected $fillable = [
        'title',
        'venue',
        'start_date',
        'end_date'
    ];
}
