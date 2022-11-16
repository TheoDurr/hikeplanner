<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;
use Illuminate\Contracts\Auth\CanResetPassword as ResetPasswordContract;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;


class User extends Model implements AuthContract, ResetPasswordContract, MustVerifyEmailContract
{
    use Authenticatable;
    use HasFactory;
    use HasUuids;
    use Authorizable;
    use CanResetPassword;
    use Notifiable;
    use MustVerifyEmail;

    protected $appends = [
        'name',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    public function getNameAttribute()
    {
        return $this->username;
    }

    public function setNameAttribute(string $name)
    {
        $this->username = $name;
    }

    public function getDisplayName()
    {
        if (!empty($this->firstname) && !empty($this->lastname)) {
            return ucfirst($this->firstname) . " " . ucfirst($this->lastname);
        } else {
            return $this->username;
        }
    }

    public function activities()
    {
        $this->hasMany(Activity::class, 'user_uuid', 'uuid');
    }
}
