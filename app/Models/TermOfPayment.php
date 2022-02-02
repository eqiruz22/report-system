<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermOfPayment extends Model
{
    use HasFactory;
    
    protected $table = 'term_of_payments';
    protected $guarded = ['id'];

    public function scopeTopSearch($query, array $filter)
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

}
