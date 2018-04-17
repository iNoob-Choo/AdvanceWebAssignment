<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name','duration', 'description', 'event_date','event_time','image_path','club_id',
  ];

  public function clubs()
  {
    return $this->belongsTo('App\Club');
  }


}
