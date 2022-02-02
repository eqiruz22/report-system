<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';
    protected $guarded = ['id'];

    public function scopeReportSearch($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query,$search){
            return $query->where('prj', 'like', '%'. $search .'%')
                         ->orWhere('project_title', 'like', '%' . $search . '%')
                         ->orWhere('po_number', 'like', '%' . $search . '%');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}