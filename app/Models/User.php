<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use \Illuminate\Auth\Authenticatable;


class User extends Model implements AuthContract
{
    use Authenticatable;
    use HasFactory;
    use HasUuids;
    use Authorizable;
    use CanResetPassword;

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

    public function getNameAttribute(){
        return $this->username;
    }

    public function setNameAttribute(string $name){
        $this->username = $name;
    }
}
