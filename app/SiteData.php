<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteData extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['entity','attribute','value'];
}
