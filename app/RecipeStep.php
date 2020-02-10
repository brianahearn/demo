<?php

namespace App;

class RecipeStep extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recipe_steps';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipe_id', 'step_number', 'step_title','step_description','asset_id'
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
