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

    public function users()
{
    return $this->hasMany(Userlist::class, 'role_id');
}

}
