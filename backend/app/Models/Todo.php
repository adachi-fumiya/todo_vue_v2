<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = ['id'];

    protected $appends = array('editFlag');

    public function getEditFlagAttribute()
    {
        return true;
    }
}
