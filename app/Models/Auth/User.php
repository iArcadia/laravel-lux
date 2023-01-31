<?php

namespace App\Models\Auth;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int|null $id ID of the user.
 * @property string $name Name of the user.
 * @property string $email Email address of the user.
 * @property string $password Hashed password of the user.
 * @property Carbon|null $email_verified_at Date of when the email was verified.
 * @property string|null $remember_token
 * @property Carbon|null $created_at Date of creation of the user.
 * @property Carbon|null $updated_at Last update of the user.
 */
class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable, CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
}
