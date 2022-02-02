<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Report;

class StatusProject extends Model
{
    use HasFactory;

    protected $table = 'status_projects';
    protected $guarded = ['id'];

    public function scopeStatusSearch($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query,$search){
            return $query->whereHas('report', function($query) use ($search){
               $query->where('prj', 'like', '%' . $search . '%');
             });
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
