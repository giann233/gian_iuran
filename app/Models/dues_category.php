<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dues_category extends Model
{
    protected $fillable = [
        'period',
        'nominal',
        'status',
    ];

    public function duesMembers()
    {
        return $this->hasMany(dues_members::class, 'id_duescategory');
    }
}
