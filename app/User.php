<?php

namespace App;



use Jenssegers\Mongodb\Eloquent\Model;
use App\Overrides\Notifications\Notifiable\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
// use Illuminate\Contracts\Auth\Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Notifications\SampleWebSocket;
// use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

use App\User;
// use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

use Illuminate\Support\Facades\Notification;
// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Support\Facades\Notification;

class User extends Authenticatable
{
    use AuthenticatableTrait;
    use Notifiable;

    protected $connection='mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function boot()
    {
        parent::boot();

        static::created(function($model){

            // $admins = User::all()->filter(function($user){
            //     return $user::where('role', 'admin')->get();
            // });
            // $det=['data'=>'hi'];
          $org =User::where('role', 'admin')->get();
            // dd($model);
            // $user = User::first();
            // dd($user->name);
            
          Notification::send($org,new SampleWebSocket($model));
        //
        // $user->notify(new CardMoved($model));
                    
        });
        
        
    }
}
