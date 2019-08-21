<?php

namespace App;

use App\Http\BaseModel;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;

class Participant extends BaseModel
{
    use LaravelVueDatatableTrait;

    protected $fillable = [
        'lastname',
        'firstname',
        'mi',
        'sex',
        'mobile',
        'email'
    ];

    protected $appends = [
        'fullname',
        'last_attended'
    ];

    protected $dataTableColumns = [
        'id' => [
            'searchable' => true,
        ],
        'lastname' => [
            'searchable' => true,
        ],
        'firstname' => [
            'searchable' => true,
        ],
        'mi' => [
            'searchable' => false
        ],
        'sex' => [
            'searchable' => false
        ],
        'mobile' => [
            'searchable' => true
        ],
        'email' => [
            'searchable' => true
        ]
    ];

    /**
     * Set the participant's last name.
     *
     * @param  string  $value
     * @return string
     */
    public function setLastnameAttribute($value)
    {
        $this->attributes['lastname'] = title_case(trim($value));
    }

    /**
     * Set the participant's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function setFirstnameAttribute($value)
    {
        $this->attributes['firstname'] = title_case(trim($value));
    }

    /**
     * Set the participant's middle initial.
     *
     * @param  string  $value
     * @return string
     */
    public function setMiAttribute($value)
    {
        $this->attributes['mi'] = strtoupper(str_replace('.', '', trim($value)));
    }

    /**
     * Get the participants's middle initial.
     *
     * @param  string  $value
     * @return string
     */
    public function getMiAttribute($value)
    {
        $dotted = '';
        for ($i = 0; $i < strlen($value); $i++) {
            $dotted .= substr($value, $i, 1) . '.';
        }
        return $dotted;
    }

    /**
     * Get the participant's full name.
     *
     * @return string
     */
    public function getFullnameAttribute()
    {
        return "{$this->lastname}, {$this->firstname} {$this->mi}";
    }

    /**
     * Get the participant's date of last attendance.
     *
     * @return string
     */
    public function getLastAttendedAttribute()
    {
        $last = $this->events()->first();
        if ($last) {
            return $last->end_date;
        }
    }

    /**
     * Get the events attended by the participant.
     *
     * @return mixed
     */
    public function events()
    {
        return $this->belongsToMany(Event::class)->withPivot('mobile', 'email')->withTimestamps()->latest('end_date');
    }
}
