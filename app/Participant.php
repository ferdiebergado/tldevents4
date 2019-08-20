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
        'fullname'
    ];

    protected $dataTableColumns = [
        'id' => [
            'searchable' => false,
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
        $lastname = $this->ucaseName($value);
        $this->attributes['lastname'] = $lastname;
    }

    /**
     * Set the participant's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function setFirstnameAttribute($value)
    {
        $firstname = $this->ucaseName($value);

        $this->attributes['firstname'] = $firstname;
    }

    /**
     * Set the participant's middle initial.
     *
     * @param  string  $value
     * @return string
     */
    public function setMiAttribute($value)
    {
        $this->attributes['mi'] = strtoupper(str_replace('.', '', $value));
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

    protected function ucaseName($name)
    {
        $names = explode(' ', $name);
        $ucased = '';
        foreach ($names as $value) {
            $ucased .= ucfirst($value) . ' ';
        }
        return trim($ucased);
    }
}
