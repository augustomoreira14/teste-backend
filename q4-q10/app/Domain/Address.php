<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    protected $fillable = [
        'number',
        'street',
        'complement',
        'district',
        'city',
        'state',
        'zipCode'
    ];

    public $timestamps = false;

}
