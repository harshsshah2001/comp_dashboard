<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';

    protected $fillable = [
        'permission_name',
        'description'
    ];

    public function permission(){
       return $this->hasMany(UserPermission::class,'permission_id');
    }
}
