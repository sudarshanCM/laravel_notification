<?php

namespace App\Overrides\Notifications\Notifiable;

use Illuminate\Notifications\RoutesNotifications;
use App\Overrides\Notifications\Notifiable\HasDatabaseNotifications as HasDatabaseNotifications;
require_once 'HasDatabaseNotifications.php';
trait Notifiable
{
    use HasDatabaseNotifications, RoutesNotifications;
}
