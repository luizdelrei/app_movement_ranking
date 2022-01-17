<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{
    use HasFactory;
    protected $table = 'personal_record';
    protected $fillable = [
        'id',
        'user_id',
        'movement_id',
        'value',
        'date'
    ];

    public function user()
    {
        return $this->belongsToMany('App\Models\User', 'personal_record', 'id');
    }
    public function movement()
    {
        return $this->belongsToMany('App\Models\Movement', 'personal_record', 'id');
    }
}
