<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserManagerModel extends Model
{

    use HasFactory;

    protected $table = 'user_manager';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable=[
        'user_id',
        'name',
        'password',
        'create_date'
    ];
}
