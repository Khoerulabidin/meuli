<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'user_mstr';
    protected $primaryKey = 'user_mstr_id';

    const CREATED_AT = 'user_mstr_ct';
    const UPDATED_AT = 'user_mstr_ut';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_mstr_name',
        'user_mstr_email',
        'user_mstr_password',
        'user_mstr_status',
        'user_mstr_branch',
        'user_mstr_cb',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'user_mstr_password',
        'remember_token',
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
            'user_mstr_password' => 'hashed',
        ];
    }

    public function getAuthPassword()
    {
        return $this->user_mstr_password;
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_mstr_uuid = Str::uuid(); // Auto-generate
        });
    }
}
