<?php

namespace App;
use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;

class User extends Authenticatable
{
    use Notifiable;

    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'pic' , 'slug' , 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function friend()
    {
        return $this->hasMany(FriendShips::class );
    }


    public function notifications()
    {
        return $this->hasMany(Notification::class );
    }

    public function post() 
    {
        return $this->hasMany(Post::class);
    }
}