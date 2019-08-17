<?php

namespace App\Http;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class BaseModel extends Model
{
    use Cachable;
}
