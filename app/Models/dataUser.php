<?php

namespace App\Models;

use App\Models\dataUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class dataUser extends Model
{
    use HasFactory, HasRoles, Notifiable;
    protected $table = 'user';
    protected $fillable =['username', 'password', 'email',];
    protected $guard_name = 'web';
}
