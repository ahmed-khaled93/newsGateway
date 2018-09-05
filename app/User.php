<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // use Notifiable;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function VerifyUser()
    {

        return $this->hasOne('App\VerifyUser');

    }

    public function OauthClient()
    {

        return $this->hasOne('App\OauthClient');

    }

    public function EventHistory()
    {

        return $this->hasMany('App\EventHistory');

    }


    public function roles()
    {
        // return $this->belongsToMany(Role::class);
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }
    

    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles)
    {
      if (is_array($roles)) {
          return $this->hasAnyRole($roles);
      }
      return $this->hasRole($roles);
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
      // dd($this->roles());
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
      return null !== $this->roles()->where('name', $role)->first();
    }

}
