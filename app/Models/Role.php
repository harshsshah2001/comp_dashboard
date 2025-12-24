<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected  $table = 'roles';

    protected $fillable = [
        'rolename',
        'description',
    ];

    public function roles()
{
    return $this->hasMany(Userlist::class, 'role_id');
}

//one role has many permission
    public function permissions()
{
    return $this->hasMany(UserPermission::class, 'user_id');
}

}
