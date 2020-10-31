<?php

namespace App;

use App\Models\Bill;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    const PRIMARY_KEY_TABLE = 'id';
    // const USER_ADMIN = 1;
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone', "is_admin", 'last_login_at'
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
        'last_login_at' => 'datetime'
    ];

    // public function isAdmin()
    // {
    //     return $this->is_admin == self::USER_ADMIN;
    // }

    public function bills()
    {
        return $this->hasMany(Bill::class, Bill::FOREIGN_KEY_USER, self::PRIMARY_KEY_TABLE)->orderBy('id', 'DESC');
    }
}
