<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserManagerModel extends Model
{

    use HasFactory;

    protected $table = 'user_manager';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable=[
        'user_id',
        'name',
        'password',
        'designation',
        'email',
        'status'
    ];
}
