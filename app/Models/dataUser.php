<?php

namespace App\Models;

use App\Models\dataUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dataUser extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $fillable =['username', 'password'];
}
