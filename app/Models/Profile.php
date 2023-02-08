<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable = [
        'user_id',

        'first_name',
        'last_name',
        'middle_name',

        'gender',
        'birthplace',
        'status',
        'private_mode'
    ];
    //getAttribute
    public function getFullNameAttribute($value)
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }
    //laravel relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
