<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'name',
        'tipe_user',
        'foto',
        'email',
        'address',
        'phone',
        'department',
        'job_title',
        'is_active',
        'id_karyawan',
        'linkedin',
        'deskripsi_diri',
        'user_create',
        'user_update',
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
    ];



    // public function updated_name()
    // {
    //     return $this->(User::class, 'users', 'user_update');
    // }

    /**
     * Get all of the updated_name for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function updated_name()
    {
        return $this->hasMany(User::class, 'id', 'user_update');
    }
}
