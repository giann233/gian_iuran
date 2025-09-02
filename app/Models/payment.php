<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable = [
        'id_user',
        'period',
        'nominal',
        'petugas',
        'id_duescategory',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function duesCategory()
    {
        return $this->belongsTo(dues_category::class, 'id_duescategory');
    }
}
