<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $table = 'titles';
    protected $guarded = 'id';

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
