<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roleName()
    {
        switch ($this->role) {
            case 0:
                return "User";
            case 1:
                return "Admin";
            case 2:
                return "Kitchen";
            case 3:
                return "Delivery";
            default:
                return "Inactive";
        }
    }
    public function regionName()
    {
        if ($this->role != 3) {
            return "NULL";
        }

        $regionuser = RegionUser::where('user_id', $this->id)->first();
        if (!$regionuser) {
            return "NULL";
        } else {
            $region = Region::findorfail($regionuser->region_id);
            return $region->name;
        }
    }
}
