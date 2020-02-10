<?php

namespace App;

class Recipe extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recipes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
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

    // public function users()
    // {
    //   return $this->belongsToMany("App\User");
    // }
}
