<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userlist extends Model
{
    protected $table = 'userlists';

    protected $fillable = [
        'name',
        'email',
        'number',
        'password',
        'role_id',
    ];
}
