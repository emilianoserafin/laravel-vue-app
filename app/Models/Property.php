<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'street_address',
        'city',
        'province',
        'postal_code',
    ];

    public function homeOwner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
