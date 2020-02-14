<?php

namespace App\Overrides\Notifications\Notifiable;


use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Notifications\Notifiable\DatabaseNotificationCollection;

class DatabaseNotification extends Model
{
  protected $connection = 'mongodb'; 
}
