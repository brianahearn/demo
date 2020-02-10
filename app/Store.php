<?php

namespace App;

class Store extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stores';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address_line_1', 'address_line_2','city','state','zip','lat','lng','note'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    /**
       * Indicates if the model should be timestamped.
       *
       * @var bool
       */
    public $timestamps = true;

    public function users()
    {
      return $this->belongsToMany("App\User");
    }
}
