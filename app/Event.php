<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'annotation', 'time_from', 'time_to'];
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at'];
}
