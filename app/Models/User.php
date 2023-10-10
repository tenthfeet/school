<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'employee_no',
        'email',
        'password',
        'country_id',
        'mobile_no',
        'city_id',
        'state_id',
        'address',
        'date_of_birth',
        'date_of_join',
        'role_id',
        'qualification',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getTable()
    {
        return config('table.users', parent::getTable());
    }
    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }
}
