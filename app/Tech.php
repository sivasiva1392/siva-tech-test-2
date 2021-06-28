<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tech extends Model
{
    protected $fillable = [
        'tech_name', 'description'
    ];
}
