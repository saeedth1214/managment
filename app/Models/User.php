<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    // public $paginate=1;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    public $paginate=2;
    protected $fillable = [
        'full_name',
        'email',
        'password',
        "phone",
        "mobile",
        "company_name",
        'address',
        'email_verified_at',
        'active'
    ];

    public $timestamps = false;


    protected $attributes=[
       
        "active"=>0
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        "email_verified_at"
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company()
    {
        // return true;
        return $this->hasMany(company::class);
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password']=Hash::make($value);
    }
}
