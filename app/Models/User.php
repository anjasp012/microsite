<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'point'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function getAvatarAttribute()
    {
        return "https://ui-avatars.com/api/?name=" . $this->name . '&background=random';
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    function getLatestPostAttribute()
    {
        $periodeAktif = Periode::whereStatus(true)->first();
        if ($periodeAktif) {
            return $this->post()->wherePeriodeId($periodeAktif->id)->whereStatus(true)->latest()->first();
        } else {
            return null;
        }
    }
}
