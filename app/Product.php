<?php

namespace App;

class Product extends Model
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
        'name', 'ingredients', 'description','plu','upc','availability','shelf_life','tempurature_requirements','product_seasonality',
        'note','price','created_by','store_id','category_id'
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
