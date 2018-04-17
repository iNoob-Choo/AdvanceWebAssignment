<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Event as Events;

class Club extends Model
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'description','club_logo_path','user_id',
  ];


  public function users()
  {
    return $this->belongsToMany('App\User');
  }

  public function events()
  {
    return $this->hasMany(Events::class);
  }




}
