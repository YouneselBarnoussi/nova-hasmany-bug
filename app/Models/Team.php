<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function admins()
    {
        return $this->hasMany(TeamUser::class)
            ->where('role', 'admin');
    }

    public function members()
    {
        return $this->hasMany(TeamUser::class)
            ->where('role', 'member');
    }
}
