<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'job_title',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeUserSearch($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query,$search){
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhere('email', 'like', '%' . $search . '%');
        });
    }

    public function title()
    {
        return $this->belongsTo(Title::class, 'title_id');
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function statusProject()
    {
        return $this->hasMany(StatusProject::class);
    }

    public function progresproject()
    {
        return $this->hasMany(ProgresProject::class);
    }

    public function termofpayment()
    {
        return $this->hasMany(TermOfPayment::class);
    }

}