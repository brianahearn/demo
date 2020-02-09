<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
  public $timestamps = false;
  public $incrementing = false;
  // $primaryKey = null;
  public $primaryKey = 'email';

  protected $fillable = [
        'email', 'token', 'created_at'
    ];
}
