<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteData extends Model
{

	protected $table = 'site_data';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['entity','attribute','value'];

    public function userdetail()
    {
    	return $this->belongsTo('App/UserDetail');
    }
}
