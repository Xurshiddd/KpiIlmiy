<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Panel;
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'avatar',
        'phone',
        'uuid',
        'employee_id_number',
        'type',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
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
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->email === 'admin@gmail.com';
    }

    public function infos()
    {
        return $this->hasMany(UserInfo::class, 'user_id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }
    public function merges()
    {
        return $this->hasMany(Merge::class);
    }

    public function targetIndicators()
    {
        return $this->belongsToMany(TargetIndicator::class, 'merges')
            ->withTimestamps();
    }
    public function articles()
    {
        return $this->hasMany(Article::class,'author_id');
    }
}
