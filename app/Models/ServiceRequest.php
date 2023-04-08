<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_category_id',
        'service_type_id',
        'description',
        'date',
        'status',
        'assigned_agent_id',
        'completed',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function serviceCategory(){
            return $this->belongsTo(ServiceCategory::class);
    }
    public function serviceType(){
        return $this->belongsTo(ServiceType::class);
}
}
