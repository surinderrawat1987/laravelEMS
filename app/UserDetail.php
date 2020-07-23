<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $table = 'user_details';

    protected $fillable = [
        'created_at', 'updated_at'
    ];

    public $timestamps = false;
    /**
    * The table associated with the model.
    *
    *@var string
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function department()
    {
    	return $this->belongsTo('App\SiteData','firstdepartment');
    }
    public function designation()
    {
    	return $this->belongsTo('App\SiteData','firstdesignation');
    }
    public function appointment()
    {
    	return $this->belongsTo('App\SiteData','appointmentcategory');
    }
}
