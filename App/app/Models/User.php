<?php

namespace App\Models;

use App\Models\Contracts\WithRolesName;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements WithRolesName
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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

    //
    // Aliases
    //
    public function isRootUser()
    {
        return $this->hasRole($this::ROLE_ROOT_USER);
    }

    public function isAdminUser()
    {
        return $this->hasRole($this::ROLE_ADMIN_USER);
    }

    public function isSimpleUser()
    {
        return $this->hasRole($this::ROLE_SIMPLE_USER);
    }

    public function beRootUser()
    {
        $this->syncRoles([$this::ROLE_ROOT_USER]);
    }

    public function beAdminUser()
    {
        $this->syncRoles([$this::ROLE_ADMIN_USER]);
    }

    public function beSimpleUser()
    {
        $this->syncRoles([$this::ROLE_SIMPLE_USER]);
    }
}
