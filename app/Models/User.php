<?php
<<<<<<< HEAD
namespace App\Models;
=======

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
>>>>>>> 5dab0819ecfe3decb616006f6774379b55e6e7d8
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;
    protected $fillable = ['name','email','password','academic_year','monthly_allowance','saving_goal','is_admin'];
    protected $hidden = ['password','remember_token','two_factor_recovery_codes','two_factor_secret'];
    protected $appends = ['profile_photo_url'];
    protected function casts(): array {
        return ['email_verified_at'=>'datetime','password'=>'hashed','monthly_allowance'=>'decimal:2','saving_goal'=>'decimal:2','is_admin'=>'boolean'];
    }
    public function transactions(){ return $this->hasMany(Transaction::class); }
    public function categories(){ return $this->hasMany(Category::class); }
    public function budgets(){ return $this->hasMany(Budget::class); }
}
=======
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<UserFactory> */
    use HasFactory;

    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

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
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
>>>>>>> 5dab0819ecfe3decb616006f6774379b55e6e7d8
