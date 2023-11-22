<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'password' => 'hashed',
    ];

    protected $attributes = [
        'name' => 'Default Name',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $username = Str::before($user->email, '@');
            $user->name = $username;
        });

        static::creating(function ($user) {
            $domain = Str::after($user->email, '@');

            switch ($domain) {
                case 'mahasiswa.com':
                    $user->role = 'mahasiswa';
                    break;
                case 'dosen.com':
                    $user->role = 'dosenwali';
                    break;
                case 'operator.com':
                    $user->role = 'operator';
                    break;
                case 'departemen.com':
                    $user->role = 'departemen';
                    break;
                default:
                    $user->role = 'user';
                    break;
            }
        });
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id_user', 'id');
    }


}
